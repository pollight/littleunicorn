<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Services\RussiaPoshtaServices;
use App\Services\CartServices;
use Storage;

class BasketController extends Controller
{
    public function add(Request $request){
        $product = Product::findOrFail($request->product_id);
        if($request->size != null ){
            $price = $product->options[$request->size]['value'];
            $id = $product->id.'_'.$request->size;
            $name = $product->name.' '.$product->options[$request->size]['name'];
        }else{
            $price = $product->price;
            $name = $product->name;
            $id = $product->id;
        }
        $quantity = $request->quantity != null ? $request->quantity : 1;
        $items = [
            'id'       => $id,
            'name'     => $name,
            'qty'      => $quantity,
            'price'    => $price,
            'options' => [
                'size' =>$request->size,
                'image'=>Storage::url( $product->image),
                'product_id'=>$product->id,
            ],
        ];
        $cart = Cart::add($items);
        $product = Cart::get($cart->rowId);
        return view('chunks.basket.in_basket',compact('product'));
    }
    public function update(Request $request){
        Cart::update($request->id, $request->qty); // Will update the quantity
    }
    public function remove(Request $request){
        Cart::remove($request->id);
    }
    public function count(){
        return Cart::count();
    }
    public function count_delivery(RussiaPoshtaServices $poshtaService, CartServices $cartServices){
        return $cartServices->getCount() +  $poshtaService->getCountDelivery()->getPayNds();
    }
//    public function total(RussiaPoshtaServices $poshtaService, CartServices $cartServices){
//        return $cartServices->getCount() +  $poshtaService->getCountDelivery()->getPayNds();
//    }
    public function total(CartServices $cartServices){
        return $cartServices->getCount();
    }
    public function sum(){
        return Cart::total();
    }
    public function addedItem(){
        return view('chunks.basket.added_item_block');
    }
}
