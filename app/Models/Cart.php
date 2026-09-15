<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    /**
     * L'utilisateur propriétaire du panier (peut être null pour un invité).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Les articles présents dans ce panier.
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Le total du panier (somme des lignes).
     */
    public function getTotalAttribute(): float
    {
        return $this->items->sum(fn (CartItem $item) => $item->price * $item->quantity);
    }

    /**
     * Le nombre total d'articles dans le panier (toutes quantités confondues).
     */
    public function getItemsCountAttribute(): int
    {
        return $this->items->sum('quantity');
    }
}