<?php

namespace App\Http\Controllers\Ajax;

use CdekSDK\CdekClient;
use CdekSDK\Requests\CalculationRequest;
use CdekSDK\Requests\PvzListRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Ixudra\Curl\Facades\Curl;
use phpDocumentor\Reflection\Types\Integer;

class DeliveryController extends Controller
{
    public $uri_test = 'http://integration.edu.cdek.ru';
    public $uri_production = 'http://integration.cdek.ru';

    private function productCalk(Product $product, $postal_code){

        $request = new CalculationRequest();
        $request->setSenderCityPostCode($postal_code)
            ->setReceiverCityPostCode( session('geo')['postal_cade'] )
            ->setTariffId(1)->addPackage([
                'weight' => $product->weight,
                'length' => $product->length,
                'width'  => $product->width,
                'height' => $product->height,
            ]);
        return $this->client()->sendCalculationRequest($request);
    }
    //
    public function client(){
        return $client = new CdekClient('z9GRRu7FxmO53CQ9cFfI6qiy32wpfTkd', 'w24JTCv4MnAcuRTx0oHjHLDtyt3I6IBq',new Client([
            'base_uri' => $this->uri_test,
        ]));
    }


    public function cost(Request $request){
        $postal_code = session('geo')['postal_cade'];
        $totalCost = [];
        foreach( Cart::content() as $product ){

            $cost = $this->productCalk(Product::find($product->id),$postal_code);
            $total = [
                'id' => $product->id,
                'cost' => $cost->getPrice()*$product->qty,
                'date_min' => $cost->getDeliveryDateMin(),
                'date_max' => $cost->getDeliveryDateMax(),
                'min' => $cost->getDeliveryPeriodMin(),
                'max' => $cost->getDeliveryPeriodMax(),
            ];
            array_push($totalCost, $total);
        }
        return $totalCost;
    }

    public function costProdut(Request $request){
        $product = Product::find($request->product_id);
        $request = new CalculationRequest();
        $request->setSenderCityPostCode('630000')
            ->setReceiverCityPostCode( session('geo')['postal_cade'] )
            ->setTariffId(1)->addPackage([
                'weight' => $product->weight,
                'length' => $product->length,
                'width'  => $product->width,
                'height' => $product->height,
            ]);

        $result = $this->client()->sendCalculationRequest($request);
        $min = $result->getDeliveryPeriodMin();
        $max = $result->getDeliveryPeriodMax();
        $cost = $result->getPrice();
        return ['min' => $min, 'max' => $max, 'cost' => $cost ];
    }
}
