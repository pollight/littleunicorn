<?php
namespace App\Services;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Ixudra\Curl\Facades\Curl;

class SberServices{
    protected $status_order_url = 'https://securepayments.sberbank.ru/payment/rest/getOrderStatusExtended.do';
    protected $create_order_url = 'https://securepayments.sberbank.ru/payment/rest/register.do';
    protected $userName;
    protected $password;
    protected $returnUrl;
    protected $failUrl;

    public function __construct()
    {
        $this->userName = config('sber.auth.serName');
        $this->password = config('sber.auth.password');

        $this->returnUrl = config('sber.page.returnUrl');
        $this->failUrl = config('sber.page.failUrl');
    }

    public function registerOrder(Order $order){
        $param = [
            'userName'=>$this->userName,
            'password'=>$this->password,
            'returnUrl'=>$this->returnUrl,
            'failUrl' =>$this->failUrl,
            'amount'=>(integer)$order->amount*100,
            'orderNumber'=>$order->id,
        ];
        $param = http_build_query($param);
        $url = $this->create_order_url.'?'.$param;
        $response = Curl::to($url)
            ->asJson()
            ->get();
   
        return $response;
    }

    public  function getStatus(Order $order){
        $param = [
            'userName'=>$this->userName,
            'password'=>$this->password,
            'orderId'=>$order->transaction_id,
            'orderNumber'=>$order->id,
        ];
        $param = http_build_query($param);
        $url = $this->status_order_url.'?'.$param;
        $response = Curl::to($url)
            ->withData( $param )
            ->asJson()
            ->get();
        return  $response->orderStatus;

    }
}