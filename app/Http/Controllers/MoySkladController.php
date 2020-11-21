<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use MoySklad\Entities\Country;
use MoySklad\Entities\Products\Product as ProductMoySklad;
use MoySklad\MoySklad;
use App\Services\MoySkladServices;
use App\Models\ProductStore;
use Ixudra\Curl\Facades\Curl;

class MoySkladController extends Controller
{
    protected $login;
    protected $password;

    public function __construct()
    {
        $this->login = config('moy-sklad.auth.login');
        $this->password = config('moy-sklad.auth.password');

    }
    public function modification(MoySkladServices $moySkladServices){
        foreach($moySkladServices->getModification() as $key=>$modification) {
            $moySkladServices->addModification($modification);
        }
    }
    //
    public function index( MoySkladServices $moy_sklad_services){
        foreach ($moy_sklad_services->getProducts() as $product){
            $moy_sklad_services->addProduct($product);
        }


//        if(!$assortment = Product::where('productId',$list->fields->id)->first() ){
//            $assortment = new Product();
//            $assortment->productId = $list->fields->id;
//            $assortment->accountId = $list->fields->accountId;
//        }
//
//        $assortment->description = isset($list->fields->description) ? str_replace("\n", "<br>", $list->fields->description) : null;
//        $assortment->image = $moy_sklad_services->downloadImage($list);
//        $assortment->shared = isset($list->fields->shared) ? $list->fields->shared : null;
//        $assortment->version = isset($list->fields->version) ? $list->fields->version : null;
//        $assortment->updated = isset($list->fields->updated) ? $list->fields->updated : null;
//        $assortment->name = $list->fields->name;
//        $assortment->code = isset($list->fields->code) ? $list->fields->code : null;
//        $assortment->externalCode = isset($list->fields->externalCode) ? $list->fields->externalCode : null;
//        $assortment->archived = isset($list->fields->archived) ? $list->fields->archived : null;
//        $assortment->pathName = $list->fields->pathName;
//        $assortment->minPrice = isset($list->fields->minPrice) ? $list->fields->minPrice : null;
//        $assortment->salePrices = isset($list->fields->salePrices) ? json_encode($list->fields->salePrices) : null;
//        $assortment->buyPriceValue = isset($list->fields->buyPrice->value) ? $list->fields->buyPrice->value : null;
//        $assortment->buyPriceCurrency = $moy_sklad_services->getCurrencyBuyPrice($list->fields->buyPrice->currency->meta->href);
//        $assortment->article = isset($list->fields->article) ? $list->fields->article : null;
//        $assortment->weight = isset($list->fields->weight) ? $list->fields->weight : null;
//        $assortment->volume = isset($list->fields->volume) ? $list->fields->volume : null;
//        $assortment->barcodes = isset($list->fields->barcodes) ? json_encode($list->fields->barcodes) : null;
//        $assortment->modificationsCount = isset($list->fields->modificationsCount) ? $list->fields->modificationsCount : null;
//        $assortment->isSerialTrackable = isset($list->fields->isSerialTrackable) ? $list->fields->isSerialTrackable : null;
//        $assortment->country = $list->relations->find(Country::class) != null ? $moy_sklad_services->getCountry($list->relations->find(Country::class)->fields->meta->href) : null;
//        $store = $moy_sklad_services->getStore($list->fields->id);
//        $assortment->store = isset($store->rows) ? json_encode($store->rows) : null;
//        $assortment->save();
//        echo "add id-{$assortment->productId}, name-{$assortment->name} \n";
//        if($list->fields->pathName != null){
//            $categoryLists = explode('/',$list->fields->pathName);
//            foreach ($categoryLists as $key=>$categoryList){
//                if($key == 0){
//                    $parent = 0;
//                    if(!$category = Category::where('name',$categoryList)->first() ){
//                        $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//                    }
//                    $parent = $category->id;
//                }
//                if(!$category = Category::where('name',$categoryList)->first() ){
//                    $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//                }
//                $parent = $category->id;
//                $assortment->category_id = $parent;
//                $assortment->save();
//            }
//        }

    }
}

function addCat($categoryLists, $parent=0){
    if($parent == 0){
        if(!$category = Category::where('name',$categoryLists)->first() ){
            $category = Category::create(['name' => $categoryLists,'category_id'=>$parent]);
        }
        return addCat($categoryLists,$category->id);
    }
}

//$category = Category::firstOrCreate(['name' => $categoryList,'parent_id'=>$parent]);
//$parent = $category->id;

//if(   ){
//
//    if( Category::where('parent_id',$category->id)->first() ){
//        Category::firstOrCreate(['name' => $categoryList ,'parent_id' => 0 ]);
//    }else{
//
//    }
//}else{
//    $category = Category::firstOrCreate(['name' => $categoryList ,'parent_id' => 0 ]);
//}






//        if(count($store->rows) > 0 ){
//            foreach($store->rows as $rows){
//                foreach($rows->stockByStore as $stockByStore){
//                    if(isset($stockByStore->name)){
//                        $stores = Store::firstOrCreate([
//                            'name' => $stockByStore->name,
//                            'stock' => $stockByStore->stock,
//                            'reserve' => $stockByStore->reserve,
//                            'inTransit' => $stockByStore->inTransit
//                        ]);
//                        $assortment->stores()->save($stores);
//                    }
//                }
//            }
//        }