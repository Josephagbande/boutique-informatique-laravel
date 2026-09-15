<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['HP', 'Dell', 'Lenovo', 'Asus', 'Logitech', 'Samsung', 'Kingston', 'MSI'];

        foreach ($brands as $name) {
            Brand::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
            ]);
        }
    }
}