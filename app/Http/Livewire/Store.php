<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Store extends Component
{

    // Component's Variables

    public $products = [];
    public $cart_items = [];
    public $vat = 0;
    public $totalSum = 0;




    public $favoritePage = false;
    public $productsPage = true;

    // Component's General Functions

    public function mount()
    {
        $this->getProducts();
        $this->finalSumCalculator();
        $this->finalSumCalculator();
    }

    public function render()
    {
        return view('livewire.store');

    }

    // Task's (DB Side) 2 & 3 & 6 - The Imports from the DB ; (Favorite Products will be filtered in the view).

    public function getProducts()
    {
        $this->products = Product::orderByDesc('created_at')->get();
        $this->cart_items = Cart::orderByDesc('created_at')->get();
        foreach($this->cart_items as $item){
            if($item->discount_num>0){
                $calculatedPrice = $this->percentageCalculator($item->price_num,$item->qty,$item->discount_num);
                $item->price_sum = $calculatedPrice['sum'];
                $item->discount_sum = $calculatedPrice['percentage_sum'];
            } else {
                $item->price_sum = $item->price_num * $item->qty;
            }
        }
    }

    // Task 4 (DB Side) - Setting & Removing a Product from Favorite's.

    public function setFavorite($id)
    {
        $product = Product::where('id',$id)->first();
        if(!$product){
            return;
        }

        $product->favorite = !$product->favorite;
        $product->save();
        $this->getProducts();
        $this->finalSumCalculator();
    }


    // Task 5 (DB Side) - Adding & Removing from Cart Functions

    public function setInOrder($id)
    {
        $cart_item = Cart::where('product_id',$id)->first();
        if(!$cart_item){
            return;
        }

        $cart_item->qty++;
        $cart_item->save();
        $this->getProducts();
        $this->finalSumCalculator();
    }

    public function removeFromOrder($id)
    {
        $cart_item = Cart::where('product_id',$id)->first();
        if(!$cart_item){
            return;
        }

        $cart_item->qty--;
        $cart_item->save();
        $this->getProducts();
        $this->finalSumCalculator();
    }

    // Discounted Price

    public function percentageCalculator($prodPrice,$prodQty,$prodDiscount)
    {
        if($prodDiscount==0){
            return;
        }

        $totalPrice = $prodQty * $prodPrice;

        $discount = $totalPrice / $prodDiscount;

        $sum = $totalPrice - $discount;

        /*
            calculatedPrice->sum - to sync the cart_item price with the amount of qty it has;
            calculatedPrice->percentage_sum - to display in view how much the cart_item was discounted;
        */

        $calculatedPrice = ['sum'=>$sum,'percentage_sum'=>$discount];

        return $calculatedPrice;
    }

    // Finalized Price Function

    public function finalSumCalculator()
    {
        $sum = 0;
        foreach($this->cart_items as $item){
            if($item->qty>0){
                $sum = $sum + $item->price_sum;

            }
        }

        /*
            percentageCalculator - for calculating the final sum (with VAT) ,
            and finalizing the order.
        */

        $calculatedVat = $this->percentageCalculator($sum,1,17);

        $this->totalSum = $sum + $calculatedVat['percentage_sum'];
        $this->vat = $calculatedVat['percentage_sum'];

    }

    // Page Navigation Functions

    public function setFavoritePage()
    {
        $this->favoritePage = true;
        $this->productsPage = false;
        $this->getProducts();
        $this->finalSumCalculator();
    }

    public function setProductsPage()
    {
        $this->favoritePage = false;
        $this->productsPage = true;
        $this->getProducts();
        $this->finalSumCalculator();
    }



}
