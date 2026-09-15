<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $ordinateurs = Category::where('slug', 'ordinateurs')->first();
        $stockage = Category::where('slug', 'stockage')->first();
        $peripheriques = Category::where('slug', 'peripheriques')->first();

        $hp = Brand::where('name', 'HP')->first();
        $dell = Brand::where('name', 'Dell')->first();
        $lenovo = Brand::where('name', 'Lenovo')->first();
        $logitech = Brand::where('name', 'Logitech')->first();
        $kingston = Brand::where('name', 'Kingston')->first();

        $products = [
            [
                'category_id' => $ordinateurs->id,
                'brand_id' => $hp->id,
                'name' => 'HP Pavilion 15 - Core i5',
                'description' => 'PC portable polyvalent pour le travail et les études, écran 15,6 pouces Full HD.',
                'price' => 420000,
                'sale_price' => 389000,
                'condition' => 'new',
                'stock_quantity' => 12,
                'specs' => [
                    'Processeur' => 'Intel Core i5-1235U',
                    'RAM' => '8 Go',
                    'Stockage' => 'SSD 512 Go',
                    'Écran' => '15.6" Full HD',
                    'Système d\'exploitation' => 'Windows 11',
                ],
            ],
            [
                'category_id' => $ordinateurs->id,
                'brand_id' => $dell->id,
                'name' => 'Dell Inspiron 15 Gaming',
                'description' => 'PC portable gaming avec carte graphique dédiée pour les jeux et la création.',
                'price' => 650000,
                'sale_price' => null,
                'condition' => 'new',
                'stock_quantity' => 5,
                'specs' => [
                    'Processeur' => 'Intel Core i7-12700H',
                    'RAM' => '16 Go',
                    'Stockage' => 'SSD 1 To',
                    'Carte graphique' => 'NVIDIA RTX 3050',
                    'Écran' => '15.6" 144Hz',
                ],
            ],
            [
                'category_id' => $ordinateurs->id,
                'brand_id' => $lenovo->id,
                'name' => 'Lenovo ThinkPad E14 (Reconditionné)',
                'description' => 'PC professionnel reconditionné, idéal bureautique et fiabilité longue durée.',
                'price' => 210000,
                'sale_price' => null,
                'condition' => 'refurbished',
                'stock_quantity' => 8,
                'specs' => [
                    'Processeur' => 'Intel Core i5-8250U',
                    'RAM' => '8 Go',
                    'Stockage' => 'SSD 256 Go',
                    'Écran' => '14" HD',
                ],
            ],
            [
                'category_id' => $stockage->id,
                'brand_id' => $kingston->id,
                'name' => 'Kingston SSD 480 Go',
                'description' => 'SSD SATA III rapide pour améliorer les performances de votre PC.',
                'price' => 28000,
                'sale_price' => null,
                'condition' => 'new',
                'stock_quantity' => 40,
                'specs' => [
                    'Capacité' => '480 Go',
                    'Interface' => 'SATA III',
                    'Vitesse lecture' => '550 Mo/s',
                ],
            ],
            [
                'category_id' => $stockage->id,
                'brand_id' => $kingston->id,
                'name' => 'Clé USB Kingston 64 Go',
                'description' => 'Clé USB 3.0 compacte et rapide pour le transfert de fichiers.',
                'price' => 6500,
                'sale_price' => 5500,
                'condition' => 'new',
                'stock_quantity' => 100,
                'specs' => [
                    'Capacité' => '64 Go',
                    'Interface' => 'USB 3.0',
                ],
            ],
            [
                'category_id' => $peripheriques->id,
                'brand_id' => $logitech->id,
                'name' => 'Logitech MK540 - Clavier & Souris sans fil',
                'description' => 'Combo clavier et souris sans fil, confortable pour un usage quotidien.',
                'price' => 22000,
                'sale_price' => null,
                'condition' => 'new',
                'stock_quantity' => 25,
                'specs' => [
                    'Connexion' => 'Sans fil 2.4 GHz',
                    'Autonomie' => 'Jusqu\'à 36 mois (clavier)',
                ],
            ],
        ];

        foreach ($products as $data) {
            $specs = $data['specs'];
            unset($data['specs']);

            $data['slug'] = Str::slug($data['name']);
            $data['reference'] = strtoupper(Str::random(8));
            $data['status'] = 'active';

            $product = Product::create($data);

            $product->images()->create([
    'image' => 'https://placehold.co/600x600/e5e3de/697386?text=' . urlencode($data['name']),
    'is_primary' => true,
]);

            foreach ($specs as $name => $value) {
                $product->specs()->create([
                    'spec_name' => $name,
                    'spec_value' => $value,
                ]);
            }
        }
    }
}