<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Route;
class CategoryController extends Controller
{
    //
    public function index($slug = null){
        $categoriesArr = Route::current()->parameters();
        $slugs = explode('/',$categoriesArr['slug']);
        $category = Category::whereSlug(end($slugs))->firstOrFail();
        if($category->products->count() > 0){
            return view('assortment',compact('category','slugs'));
        }
            return view('categories',compact('category','slugs'));
    }
    public function product(){
        $categoriesArr = Route::current()->parameters();
        $categoriesArr = explode('/',$categoriesArr['slug']);
        $product = Product::whereSlug(end($categoriesArr))->firstOrFail();
        return view('product',compact('product'));
    }
}
