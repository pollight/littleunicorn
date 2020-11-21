<?php

namespace App\Http\Controllers;

use CdekSDK\CdekClient;
use CdekSDK\Requests\PvzListRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Gloudemans\Shoppingcart\Facades\Cart;
use phpDocumentor\Reflection\Types\Integer;

class BasketController extends Controller
{
    public $uri_test = 'http://integration.edu.cdek.ru';
    //
    public function index(){
        $countDelivery = $this->getCountDelivery();
        $count = $this->getCount();
        return view('pages.basket',compact('countDelivery','count'));
    }

    public function client(){
        return $client = new CdekClient('z9GRRu7FxmO53CQ9cFfI6qiy32wpfTkd', 'w24JTCv4MnAcuRTx0oHjHLDtyt3I6IBq',new Client([
            'base_uri' => $this->uri_test,
        ]));
    }

    private function getCount(){
        $count =  str_replace(" ", "", Cart::total());
        return (integer) $count;
    }

    private  function  getCountDelivery(){
    $objectId = 27030; // Письмо с объявленной ценностью
    // Минимальный набор параметров для расчета стоимости отправления
    $params = [
        'weight' => 10000, // Вес в граммах
        'from' => 690000, // Почтовый индекс места отправления
        'to' => session('geo')['postal_cade'],
//            pack - 20 (M) 10 (S)
        'pack' => 20
    ];

    // Список ID дополнительных услуг
    // 2 - Заказное уведомление о вручении
    // 21 - СМС-уведомление о вручении
    //        $services = [2,21];

    $TariffCalculation = new \LapayGroup\RussianPost\TariffCalculation();
    $calcInfo = $TariffCalculation->calculate($objectId, $params);
    return $calcInfo;
    }
}
