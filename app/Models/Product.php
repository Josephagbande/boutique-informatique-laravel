<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'reference',
        'description',
        'price',
        'sale_price',
        'condition',
        'stock_quantity',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    /**
     * La catégorie de ce produit.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * La marque de ce produit.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Les images de ce produit.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * L'image principale de ce produit.
     */
    public function primaryImage(): HasMany
    {
        return $this->images()->where('is_primary', true);
    }

    /**
     * Les caractéristiques techniques de ce produit.
     */
    public function specs(): HasMany
    {
        return $this->hasMany(ProductSpec::class);
    }

    /**
     * Les favoris associés à ce produit (tous utilisateurs confondus).
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * L'image à afficher pour ce produit : priorise l'image marquée "principale",
     * sinon retombe sur la première image disponible.
     */
    public function getDisplayImageAttribute(): ?ProductImage
    {
        return $this->images->firstWhere('is_primary', true) ?? $this->images->first();
    }

    /**
     * Le produit est-il en stock ?
     */
    public function inStock(): bool
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Le prix effectif à afficher (promo si présente, sinon prix normal).
     */
    public function getCurrentPriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    /**
     * Pourcentage de remise si le produit est en promotion.
     */
    public function getDiscountPercentAttribute(): ?int
    {
        if (! $this->sale_price) {
            return null;
        }

        return (int) round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    /**
     * Le produit est-il "nouveau" (ajouté il y a moins de 14 jours) ?
     */
    public function getIsNewAttribute(): bool
    {
        return $this->created_at->diffInDays(now()) <= 14;
    }

    /**
     * Le produit est-il dans les favoris de l'utilisateur actuellement connecté ?
     */
    public function isFavoritedByCurrentUser(): bool
    {
        if (! auth()->check()) {
            return false;
        }

        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    /**
     * Les avis laissés sur ce produit (tous statuts).
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Les avis approuvés uniquement (à afficher publiquement).
     */
    public function approvedReviews(): HasMany
    {
        return $this->reviews()->where('status', 'approved');
    }

    /**
     * Note moyenne du produit (arrondie à 1 décimale), basée sur les avis approuvés.
     */
    public function getAverageRatingAttribute(): ?float
    {
        $avg = $this->approvedReviews()->avg('rating');

        return $avg ? round($avg, 1) : null;
    }

    /**
     * L'utilisateur connecté a-t-il acheté ce produit (condition pour pouvoir laisser un avis) ?
     */
    public function wasPurchasedByCurrentUser(): bool
    {
        if (! auth()->check()) {
            return false;
        }

        return \App\Models\OrderItem::where('product_id', $this->id)
            ->whereHas('order', fn ($q) => $q->where('user_id', auth()->id()))
            ->exists();
    }

    /**
     * L'utilisateur connecté a-t-il déjà laissé un avis sur ce produit ?
     */
    public function hasBeenReviewedByCurrentUser(): bool
    {
        if (! auth()->check()) {
            return false;
        }

        return $this->reviews()->where('user_id', auth()->id())->exists();
    }

    /**
     * Quantité totale vendue de ce produit (toutes commandes confondues).
     */
    public function getTotalSoldAttribute(): int
    {
        return \App\Models\OrderItem::where('product_id', $this->id)->sum('quantity');
    }

    /**
     * Le produit est-il un best-seller (au moins 2 unités vendues) ?
     */
    public function getIsBestsellerAttribute(): bool
    {
        return $this->total_sold >= 2;
    }
}