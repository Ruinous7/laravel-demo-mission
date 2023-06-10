<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use \App\Models\Product;
use \App\Models\Cart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $product1 = \App\Models\Product::create([
            'name' => "מוצר א'",
            'price' => 750,
            'discount' => 0,
            'favorite' => 0,
            'qty' => 0
        ]);
        $product2 = \App\Models\Product::create([
            'name' => "מוצר ב'",
            'price' => 1000,
            'discount' => 10,
            'favorite' => 0,
            'qty' => 0
        ]);
        $product3 = \App\Models\Product::create([
            'name' => "מוצר ג'",
            'price' => 2000,
            'discount' => 20,
            'favorite' => 0,
            'qty' => 0
        ]);
        $product4 = \App\Models\Product::create([
            'name' => "מוצר ד'",
            'price' => 500,
            'discount' => 5,
            'favorite' => 0,
            'qty' => 0
        ]);
        $product5 = \App\Models\Product::create([
            'name' =>"מוצר ט'",
            'price' => 1400,
            'discount' => 0,
            'favorite' => 0,
            'qty' => 0
        ]);
    }
}
