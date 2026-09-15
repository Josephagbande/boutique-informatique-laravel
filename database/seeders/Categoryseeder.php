<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Ordinateurs', 'slug' => 'ordinateurs', 'description' => 'PC portables, PC de bureau, PC gaming et Mac reconditionnés.'],
            ['name' => 'Stockage', 'slug' => 'stockage', 'description' => 'Clés USB, SSD, HDD, disques externes et cartes mémoire.'],
            ['name' => 'Périphériques', 'slug' => 'peripheriques', 'description' => 'Claviers, souris, webcams, casques, microphones et enceintes.'],
            ['name' => 'Composants', 'slug' => 'composants', 'description' => 'RAM, processeurs, cartes graphiques, cartes mères et alimentations.'],
            ['name' => 'Accessoires', 'slug' => 'accessoires', 'description' => 'Chargeurs, câbles, adaptateurs et hubs USB.'],
            ['name' => 'Impression', 'slug' => 'impression', 'description' => 'Imprimantes, cartouches et toners.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}