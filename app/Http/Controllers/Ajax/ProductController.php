<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        $page = $request->page+1;
        $products = Product::where('category_id',$request->category)->paginate( config('moy-sklad.product.paginate') );
        return view('chunks.cart_product',compact('products','page'));
    }
}
