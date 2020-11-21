<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index($slug = null){
        $page = Page::where('route', $slug)->where('active', 1);
        return view('index',compact('page'));
    }
}
