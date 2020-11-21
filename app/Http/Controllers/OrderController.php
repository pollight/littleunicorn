<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use Ixudra\Curl\Facades\Curl;
use App\Services\RussiaPoshtaServices;
use function foo\func;
use Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Services\SberServices;
class OrderController extends Controller
{
    protected $delivery;
    //
    public function index(Request $request,SberServices $sberServices){
        $request->validate([
            'city' => 'required',
            'flat' => 'required',
            'firstName' => 'required',
            'LastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'politica'=> 'required',
        ]);

        $user = $this->addUser();
        $order = $this->addOrder($user);
        $sberOrder = $sberServices->registerOrder($order);
        $order->transaction_id = $sberOrder->orderId;
        $order->save();
        return Redirect::to($sberOrder->formUrl);
    }

    private function addUser(){
        if(!$user=User::where('email',\request('email'))->first() ){
            $user = new User();
        }
        $user->lastname = \request('LastName');
        $user->name = \request('firstName');
        $user->email = \request('email');
        $user->phone = \request('phone');
        $user->sub_phone = \request('phone_sub');
        $user->password = Hash::make(rand(11111,99999));
        $user->save();
        return $user;
    }
    private function addOrder(User $user){
        $delivery = RussiaPoshtaServices::getCountDelivery();
        $deliveryCount =  (integer)$delivery->getPayNds();
        $count =  str_replace(" ", "", Cart::total());

        $order = new Order();
        $order->city = \request('city');
        $order->flat =  \request('flat');
        $order->floor = \request('floor');
        $order->door =  \request('door');
        $order->domofon = \request('domofon');
        $order->comment_delivery = \request('comments');
        $order->count = (integer) $count;
        $order->amount = (integer) $count + $deliveryCount;
        $order->delivery_count = $deliveryCount;
        $order->user_id = $user->id;
        $order->save();
        $this->addBasket($order);
        return $order;
    }
    private function addBasket(Order $order){
        foreach(Cart::content() as $row){
            $basket = new Basket();
            $basket->name = $row->name;
            $basket->size = $row->options->size;
            $basket->qty = $row->qty;
            $basket->order_id = $order->id;
            $basket->image = $row->options->image;
            $basket->sum = (integer)$row->qty + (integer)$row->price;
            $basket->save();
        }
    }
}
