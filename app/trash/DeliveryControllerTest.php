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


class DeliveryControllerTest extends Controller
{
    public $uri_test = 'http://integration.edu.cdek.ru';
    public $uri_production = 'http://integration.cdek.ru';

    public function client(){
        return $client = new CdekClient('z9GRRu7FxmO53CQ9cFfI6qiy32wpfTkd', 'w24JTCv4MnAcuRTx0oHjHLDtyt3I6IBq',new Client([
            'base_uri' => $this->uri_test,
        ]));
    }
    public function regions(){

        $request = new RegionsRequest();
        $request->setPage(0)->setSize(500);
        $request->setCountryCode('RU');
        $response = $this->client()->sendRegionsRequest($request);
            CdekRegion::query()->truncate();
        foreach ($response as $region){
            $regionMod = new CdekRegion();
            $regionMod->regionUuid = $region->getUuid();
            $regionMod->regionName = $region->getName();
            $regionMod->prefix = $region->getPrefix();
            try {
                $regionMod->regionCode =  $region->getCode();
                $regionMod->regionCodeExt = $region->getCodeExt();
                $regionMod->regionFiasGuid =  $region->getFiasGuid();
            } catch (\TypeError $e) {
                // У региона нет кода
            }
            $regionMod->save();
        }
    }

    public function cities(){

        $regions = CdekRegion::all();
        $request = new CitiesRequest();
        $request->setPage(0)->setSize(1000000)->setRegionCode(23);
        $response = $this->client()->sendCitiesRequest($request);

        dd($response);
    }


    public function cdek_id_city(){
        $response = Curl::to('https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/delivery')
            ->withHeader('Accept: application/json')
            ->withHeader('Authorization: Token c458066ea449eb69364ed10ae83db47fa0dc0d48')
            ->withData( array( 'query' => session('geo')['city_kladr_id'] ) )
            ->get();
        if ($response){
            $sdek =  json_decode($response,true);
            return $sdek['suggestions'][0]['data']['cdek_id'];
        }else{
            return null;
        }
    }

    //cityCode - setCityId
    public function point(){
        $request = new PvzListRequest();
        $request->setCityId(1278);
        $request->setType(PvzListRequest::TYPE_ALL);
        $request->setCashless(true);
        $request->setCodAllowed(true);
        $request->setDressingRoom(true);
        $response = $this->client()->sendPvzListRequest($request);
        dd($response);
    }

    public function cost(){
        $request = new CalculationRequest();
        $request->setSenderCityPostCode('630000')
            ->setReceiverCityPostCode('101000')
            ->setTariffId(1)->addPackage([
                'weight' => 0.3,
                'length' => 25,
                'width'  => 15,
                'height' => 10,
            ]);

        $result = $this->client()->sendCalculationRequest($request);
        $min = $result->getDeliveryPeriodMin();
        $max = $result->getDeliveryPeriodMax();
        $cost = $result->getPrice();
        return ['min' => $min, 'max' => $max, 'cost' => $cost ];
    }


    public function show(Request $request){
        dd($request);
    }

}
