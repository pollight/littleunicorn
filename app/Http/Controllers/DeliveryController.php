<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CdekSDK\CdekClient;
use GuzzleHttp\Client;
use CdekSDK\Requests\PvzListRequest;
use CdekSDK\Requests\CitiesRequest;
use CdekSDK\Requests\RegionsRequest;
use CdekSDK\Requests\CalculationRequest;
use App\Models\SxgeoCities;
use App\Models\SxgeoRegions;
use App\Models\CdekRegion;
use App\Models\CdekCity;
use Ixudra\Curl\Facades\Curl;
use App\Http\Requests\Delivery;


class DeliveryController extends Controller
{
    public $uri_test = 'http://integration.edu.cdek.ru';

    public function client(){
        return $client = new CdekClient('z9GRRu7FxmO53CQ9cFfI6qiy32wpfTkd', 'w24JTCv4MnAcuRTx0oHjHLDtyt3I6IBq',new Client([
            'base_uri' => $this->uri_test,
        ]));
    }

    public function calkulate($zip,$size,$tarif ){
        $request = new CalculationRequest();
//        Владивосток
        $request->setSenderCityPostCode('690000')
            ->setReceiverCityPostCode($zip)
            ->setTariffId(5)->addPackage( $size);

        $result = $this->client()->sendCalculationRequest($request);
        $min = $result->getDeliveryPeriodMin();
        $max = $result->getDeliveryPeriodMax();
        $cost = $result->getPrice();
        return ['min' =>$min,'max'=>$max, 'cost'=>$cost ];
    }

    public function show(Request $request,Delivery $delivery ){

        $standart = [
            'weight' => 5,
            'length' => 40,
            'width'  => 30,
            'height' => 20,
        ];
        $middle =  [
            'weight' => 20,
            'length' => 60,
            'width'  => 40,
            'height' => 30,
        ];
        $big =  [
            'weight' => 50,
            'length' => 100,
            'width'  => 50,
            'height' => 50,
        ];


        $zip = $request->zip_code;
        $standartDelivery = $this->calkulate($zip,$standart,1);
        $middleDelivery = $this->calkulate($zip,$middle,5);
        $bigDelivery = $this->calkulate($zip,$big,15);
        return view('pages.faq.delivery',compact('standartDelivery','middleDelivery','bigDelivery'));
    }

}
