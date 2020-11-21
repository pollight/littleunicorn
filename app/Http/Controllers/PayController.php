<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\SberServices;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class PayController extends Controller
{
    //
    public function success(SberServices $sberServices){
        if(\request('orderId') != null){
            $order = Order::where('transaction_id',request('orderId'))->firstOrFail();
            $status = $sberServices->getStatus($order);
            $order->status = $status;
            $order->save();
            Mail::send('emails.manager', ['order'=>$order], function ($message) use ($order){
                $message->from('internetmagazin@littleunicorn.shop', 'littleunicorn.shop');
                $message->subject('Заявка с сайта');
                $message->to( $order->user->email );
            });

            Cart::destroy();
            return view('pages.success');
        }
        return view('pages.error');
    }
}
