<?php
namespace App\Services;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CartServices{
    public  function getCount(){
        $count = str_replace(" ", "", Cart::total());
        return (integer) $count;
    }
}