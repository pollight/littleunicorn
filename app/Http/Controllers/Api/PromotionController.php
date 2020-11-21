<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function products(Request $request){
        $q = $request->get('q');
        return Product::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}
