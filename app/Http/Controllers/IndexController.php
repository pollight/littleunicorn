<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class indexController extends Controller
{
    //
    public function index(Request $request){
       return view('index');
    }
}
