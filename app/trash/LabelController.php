<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Label;

class LabelController extends Controller
{
    //
    public function label($label){
        $category = Label::whereSlug($label)->firstOrFail();
        $type='label';
        return view('pages.category_product', compact('category','type'));
    }
}
