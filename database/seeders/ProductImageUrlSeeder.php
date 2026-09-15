<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageUrlSeeder extends Seeder
{
    /**
     * Remplace les chemins d'images factices par des URLs de démo (picsum.photos),
     * en se basant sur l'ID du produit pour avoir une image stable à chaque rechargement.
     */
    public function run(): void
    {
        $images = ProductImage::all();

        foreach ($images as $image) {
            $seed = $image->product_id;
            $image->update([
                'image' => "https://picsum.photos/seed/product{$seed}/600/600",
            ]);
        }

        $this->command->info($images->count() . ' image(s) mise(s) à jour avec des URLs de démo.');
    }
}