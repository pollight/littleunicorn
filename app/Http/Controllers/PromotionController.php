<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Route;
class PromotionController extends Controller
{
    //
    public function index($slug){
        $promotion = Promotion::whereSlug($slug)->firstOrFail();
        return view('promotion',compact('promotion'));
    }
}
