<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SubCategoryController extends Controller
{
    //
    public function subcategory($slug, $subslug,Request $request){
        $category = Category::whereSlug($slug)->firstOrFail();
        $subcategory = Category::whereSlug($subslug)->firstOrFail();
        $type = 'catalog';
        return view('pages.subcategory', compact('category','subcategory','type'));
    }
}


//$products = $subcategory->products;
//// Get current page form url e.x. &page=1
//$currentPage = LengthAwarePaginator::resolveCurrentPage();
//// Define how many items we want to be visible in each page
//$perPage = 4;
//// Slice the collection to get the items to display in current page
//$currentPageItems = $products->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
//// Create our paginator and pass it to the view
//$paginatedItems= new LengthAwarePaginator($currentPageItems , count($products), $perPage);
//// set url path for generted links
//$paginatedItems->setPath($request->url());