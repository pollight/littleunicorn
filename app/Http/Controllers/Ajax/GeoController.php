<?php

namespace App\Http\Controllers\Ajax;

use App\Services\GeoServices;
use CdekSDK\Requests\PvzListRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SxgeoCities;
use Ixudra\Curl\Facades\Curl;

class GeoController extends Controller
{
    public function set(Request $request){
        $geo = collect([
            'city'=>$request->city,
            'postal_cade'=>$request->postal_cade,
            'city_kladr_id'=>$request->city_kladr_id
            ]);
        return $request->session()->put('geo', $geo);
    }
    public function change(Request $request,GeoServices $geoServices){
        $city = SxgeoCities::where('name_ru', $request->city)->first();
        return $geoServices->change($city);
    }
}
