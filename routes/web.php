<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\Store;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('layouts.app');
});

Route::get('/',Store::class);

