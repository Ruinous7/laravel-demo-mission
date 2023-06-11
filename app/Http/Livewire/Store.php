<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Store extends Component
{

    public $products;
    public $favoritePage = false;
    public $productsPage = true;

    public function mount()
    {
        $this->getProducts();
    }

    public function render()
    {
        return view('livewire.store');

    }

    public function setFavorite($id)
    {
        $product = Product::where('id',$id)->first();
        if(!$product){
            return;
        }

        $product->favorite = !$product->favorite;
        $product->save();
        $this->getProducts();
    }

    public function setInOrder($id)
    {
        $product = Product::where('id',$id)->first();
        if(!$product){
            return;
        }

        $product->qty++;
        $product->save();
    }

    public function setFavoritePage()
    {
        $this->favoritePage = true;
        $this->productsPage = false;
    }

    public function setProductsPage()
    {
        $this->favoritePage = false;
        $this->productsPage = true;
    }

    public function getProducts()
    {
        $this->products = Product::orderByDesc('created_at')->get();
    }
}
