<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use \App\Models\Product;
use \App\Models\Cart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Task 1 (DB Side) - The Exportation of the products & carts to the DB

    public function run(): void
    {

        // Some Products and their corresponding Cart Items

        $product1 = Product::create([
            'name' => "מוצר א'",
            'price' => 750,
            'discount' => 0,
            'favorite' => 0,
        ]);
        $product2 = Product::create([
            'name' => "מוצר ב'",
            'price' => 1000,
            'discount' => 10,
            'favorite' => 0,
        ]);
        $product3 = Product::create([
            'name' => "מוצר ג'",
            'price' => 2000,
            'discount' => 20,
            'favorite' => 0,
        ]);
        $product4 = Product::create([
            'name' => "מוצר ד'",
            'price' => 500,
            'discount' => 5,
            'favorite' => 0,
        ]);
        $product5 = Product::create([
            'name' =>"מוצר ט'",
            'price' => 1400,
            'discount' => 0,
            'favorite' => 0,
        ]);

        $cart1 = Cart::create([
            'product_id' => $product1->id,
            'name' => $product1->name,
            'price_num' => $product1->price,
            'price_sum' => 0,
            'discount_num' => $product1->discount,
            'discount_sum' => 0,
            'qty' => 0
        ]);
        $cart2 = Cart::create([
            'product_id' => $product2->id,
            'name' => $product2->name,
            'price_num' => $product2->price,
            'price_sum' => 0,
            'discount_num' => $product2->discount,
            'discount_sum' => 0,
            'qty' => 0
        ]);
        $cart3 = Cart::create([
            'product_id' => $product3->id,
            'name' => $product3->name,
            'price_num' => $product3->price,
            'price_sum' => 0,
            'discount_num' =>  $product3->discount,
            'discount_sum' => 0,
            'qty' => 0
        ]);
        $cart4 = Cart::create([
            'product_id' => $product4->id,
            'name' => $product4->name,
            'price_num' => $product4->price,
            'price_sum' => 0,
            'discount_num' => $product4->discount,
            'discount_sum' => 0,
            'qty' => 0
        ]);
        $cart5 = Cart::create([
            'product_id' => $product5->id,
            'name' => $product5->name,
            'price_num' => $product5->price,
            'price_sum' => 0,
            'discount_num' => $product5->discount,
            'discount_sum' => 0,
            'qty' => 0
        ]);
    }
}
