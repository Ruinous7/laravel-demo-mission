<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price_num',
        'price_sum',
        'discount_num',
        'discount_sum',
        'qty'
    ];
}
