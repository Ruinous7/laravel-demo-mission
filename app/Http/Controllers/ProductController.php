<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();


        return view('products.layout',[
            'products' => $products,
        ]);
    }


}
