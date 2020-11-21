<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchController extends Controller
{
    //
    public function index(Request $request){
       $products =  Product::where('name','LIKE',"%{$request->search}%")->get();
       return view('chunks.search',compact('products'));
    }
}
