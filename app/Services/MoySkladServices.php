<?php
namespace App\Services;
use Ixudra\Curl\Facades\Curl;
use App\Models\Product;
use App\Models\Modification;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class MoySkladServices{
    
    protected  $login;
    protected  $password;
    protected  $url;

    public function __construct()
    {
        $this->login = config('moy-sklad.auth.login');
        $this->password = config('moy-sklad.auth.password');
        $this->url = 'https://online.moysklad.ru/api/remap/1.2/';
    }
    //    Получить данные из url
    private function generator($uri,$full = true){
        if($full){
            $urlPath = $this->url.$uri;
        }else{
            $urlPath = $uri;
        }

        $encodeAuth =  base64_encode($this->login.':'.$this->password);
        return $responses = Curl::to($urlPath)
            ->withHeader('Authorization: Basic '.$encodeAuth)
            ->asJson()
            ->get();
    }
    private function isIsset($data){
        if(isset($data)){
            return $data;
        }
            return false;
    }
//*****************************************************
//*****************Товары*************************
//*****************************************************
    public function getProducts(){
        return $this->generator("entity/product")->rows;
    }
    public function addProduct($product){

        if(!$assortment = Product::where('productId',$product->id)->first() ){
            $assortment = new Product();
            $assortment->productId = $product->id;
            $assortment->accountId = $product->accountId;
        }
        $assortment->description = isset($product->description) ? $str = str_replace('\n', "<br>", $product->description) : null;
        $assortment->image = $this->downloadImage($product->images->meta->href);
        $assortment->shared = isset($product->shared) ? $product->shared : null;
        $assortment->version = isset($product->version) ? $product->version : 0;
        $assortment->updated = isset($product->updated) ? $product->updated : null;
        $assortment->name = isset($product->name) ? $product->name : null;
        $assortment->code = isset($product->code) ? $product->code : null;
        $assortment->externalCode = isset($product->externalCode) ? $product->externalCode : null;
        $assortment->archived = isset($product->archived) ? $product->archived : null;
        $assortment->pathName = isset($product->pathName) ? $product->pathName : null;
        $assortment->minPrice = isset($product->minPrice) ? $product->minPrice->value : null;
//        $assortment->salePrices = isset($product->salePrices) ? json_encode($product->salePrices) : null;
        $assortment->buyPriceValue = isset($product->buyPrice->value) ? $product->buyPrice->value : null;
        $assortment->buyPriceCurrency = isset($product->buyPrice->currency->meta->href)? $this->getCurrencyBuyPrice($product->buyPrice->currency->meta->href) : null;
        $assortment->article = isset($product->article) ? $product->article : null;
        $assortment->weight = isset($product->weight) ? $product->weight : null;
        $assortment->volume = isset($product->volume) ? $product->volume : null;
        $assortment->barcodes = isset($product->barcodes) ? json_encode($product->barcodes) : null;
        $assortment->modificationsCount = isset($product->modificationsCount) ? $product->modificationsCount : null;
        $assortment->isSerialTrackable = isset($product->isSerialTrackable) ? $product->isSerialTrackable : null;
        $assortment->country = $product->country->meta->href != null ? $this->getCountry($product->country->meta->href) : null;
        $store = $this->getStore($product->id);
        $assortment->store = isset($store->rows) ? json_encode($store->rows) : null;
        $assortment->save();
        $this->addCategory($assortment,$product);
    }

    private function addCategory($assortment,$product){
        $categoryLists = explode('/',$product->pathName);
        foreach ($categoryLists as $key=>$categoryList){
            if($key == 0){
                $parent = 0;
                if(!$category = Category::where('name','like', '%' . $categoryList. '%')->first() ){
                   $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
                }
                $parent = $category->id;
            }
            if(!$category = Category::where('name','like', '%' . $categoryList. '%')->first() ){
                $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
            }
            dump('add '.$category->name);
            $parent = $category->id;
            $assortment->category_id = $parent;
            $assortment->save();
        }
    }

//foreach ($categoryLists as $key=>$categoryList){
//if($key == 0){
//$parent = 0;
//if(!$category = Category::where('name',$categoryList)->first() ){
//$category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//}
//$parent = $category->id;
//}
//if(!$category = Category::where('name',$categoryList)->first() ){
//    $category = Category::create(['name' => $categoryList,'category_id'=>$parent]);
//}
//$parent = $category->id;
//$assortment->category_id = $parent;
//$assortment->save();
//}
//*****************************************************
//*****************МОДИФИКАЦИИ*************************
//*****************************************************
//    Получить ВСЕ модификации
    public function getModification(){
        $modifications = $this->generator("entity/variant");
        return $modifications->rows;
    }
//    сохранить модификации
    public function addModification($modification){
        if($hrefProduct = $modification->product->meta->href){
            $IDProduct = explode('/',$hrefProduct);
            $product = Product::where('productId',$IDProduct[8])->firstOrFail();
            if( !$modelModification = Modification::where('modificationId',$modification->id)->first() ){
                $modelModification = new Modification();
                $modelModification->modificationId = $modification->id;
                $modelModification->accountId = $modification->accountId;
            }
            $modelModification->updated = $this->isIsset($modification->updated);
            $modelModification->image = $this->downloadImage($modification->images->meta->href);
            $modelModification->name = $this->isIsset($modification->name);
            $modelModification->code = $this->isIsset($modification->code);
            $modelModification->externalCode = $this->isIsset($modification->externalCode );
            $modelModification->archived = $this->isIsset($modification->archived);
            $modelModification->characteristics = json_encode( $this->isIsset($modification->characteristics) );
            $modelModification->minPrice = isset($modification->minPrice) ? $modification->minPrice->value : null;
            $modelModification->buyPriceValue = isset($modification->buyPrice ) ? $modification->buyPrice->value : null;
            $modelModification->salePrices = json_encode($this->isIsset($modification->salePrices));
            $store = $this->getStore($modification->id);
            $modelModification->store = isset($store->rows) ? json_encode($store->rows) : null;
            $modelModification->save();
            $modelModification->products()->detach($product->id);
            $modelModification->products()->attach($product->id);
        }
    }
//*****************************************************
//*****************МОДИФИКАЦИИ КОНЕЦ*******************
//*****************************************************
    public  function getStore($productId)
    {
        $urlPath = "https://online.moysklad.ru/api/remap/1.1/report/stock/bystore?product.id={$productId}";
        $encodeAuth =  base64_encode($this->login.':'.$this->password);

        $response = Curl::to($urlPath)
            ->withHeader('Authorization: Basic '.$encodeAuth)
            ->asJson()
            ->get();
        return $response;
    }
    public function getCurrencyBuyPrice($currency){
        $encodeAuth =  base64_encode($this->login.':'.$this->password);
        $response = Curl::to($currency)
            ->withHeader('Authorization: Basic '.$encodeAuth)
            ->asJson()
            ->get();
        return $response ? $response->name : null;
    }
    public function getCountry($country){
        if($country == null) {return null; }
        $encodeAuth =  base64_encode($this->login.':'.$this->password);
        $response = Curl::to($country)
            ->withHeader('Authorization: Basic '.$encodeAuth)
            ->asJson()
            ->get();
        return $response ? $response->name : null;

    }
    public  function downloadImage($href)
    {
        $images = $this->generator($href,false);
        if($images = $images->rows){
            $ArrImg = [];
           foreach($images as $key=>$image){
               $fullName = $image->filename;
               $path = config('moy-sklad.image.download_path','products/').$image->size.$fullName;
               $dowmloadHred = $image->meta->downloadHref;
                $img = curl_init($dowmloadHred);
               curl_setopt($img, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($img, CURLOPT_BINARYTRANSFER, true);
               curl_setopt($img, CURLOPT_FOLLOWLOCATION , true);
               curl_setopt($img, CURLOPT_USERPWD, $this->login.':'.$this->password); #--------- логин и пароль
               $output = curl_exec($img);
               Storage::disk(config('moy-sklad.image.name_disk','public'))->put($path, $output);
               array_push($ArrImg,$path );
           }
           return json_encode($ArrImg);
        }
        return null;
    }
//    static function getSubCat($pathName)
//    {
//        $pathArr = explode("/", $pathName);
//        $pathArr = array_key_exists(1,$pathArr)
//            ? str_replace(self::doubleABC, "", $pathArr[1])
//            :  null ;
//        if($pathArr == null){ return null;}
//
//        $clearSubCat = trim($pathArr);
//        if(!SubCat::where('sub_cat',$clearSubCat)->exists()){
//            $subCat = new SubCat();
//            $subCat->sub_cat = $clearSubCat;
//            $subCat->save();
//            return $subCat->id;
//        }else{
//            return $subCat = SubCat::where('sub_cat',$clearSubCat)->first()->id;
//        }
//    }

//    static function getCat($pathName)
//    {
//        $pathArr = explode("/", $pathName);
//        $pathArr = array_key_exists(0,$pathArr) ? str_replace(self::ABC, "", $pathArr[0]) :  null ;
//        if($pathArr == null){ return null;}
//        $clearCat = trim($pathArr);
//
//        if(!Cat::where('cat',$clearCat)->exists()){
//            $cat = new Cat();
//            $cat->cat = $clearCat;
//            $cat->save();
//            return $cat->id;
//        }else{
//            return $cat = Cat::where('cat',$clearCat)->first()->id;
//        }
//
//    }

//    static function getStock ($productId){
//        $urlPath = "https://online.moysklad.ru/api/remap/1.1/report/stock/all?product.id={$productId}";
//        $encodeAuth =  base64_encode(self::LOGIN.':'.self::PASSWORD);
//
//        $response = Curl::to($urlPath)
//            ->withHeader('Authorization: Basic '.$encodeAuth)
//            ->asJson()
//            ->get();
//
//        return isset($response->rows[0]->stock) ? $response->rows[0]->stock : null ;
//    }


    //            $fullName = $list->image->filename;
//            $imagePath = $list->image->meta->href;
//            $img = curl_init($imagePath);
//            curl_setopt($img, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($img, CURLOPT_BINARYTRANSFER, true);
//            curl_setopt($img, CURLOPT_FOLLOWLOCATION , true);
//            curl_setopt($img, CURLOPT_USERPWD, $this->login.':'.$this->password); #--------- логин и пароль
//            $output = curl_exec($img);
//            $info = curl_getinfo($img);
//            $info['url'];
//            Curl::to($info['url'])
//                ->withContentType('image/png')
//                ->download($downloadPath.$fullName);
//            return $fullName;

//    public static function storeStore($assortment)
//    {
//
//        $urlPath = "https://online.moysklad.ru/api/remap/1.1/report/stock/bystore?product.id={$assortment->productId}";
//        $encodeAuth =  base64_encode(self::LOGIN.':'.self::PASSWORD);
//
//        $response = Curl::to($urlPath)
//            ->withHeader('Authorization: Basic '.$encodeAuth)
//            ->asJson()
//            ->get();
//
//
//        $assortmentStore = new AssortmentStore();
//        $assortmentStore->assortment_id = $assortment->id;
//        $assortmentStore->store_1 =  $response->rows[0]->stockByStore[0]->stock;
//        $assortmentStore->store_2 =  $response->rows[0]->stockByStore[1]->stock;
//        $assortmentStore->store_3 =  $response->rows[0]->stockByStore[2]->stock;
//        $assortmentStore->store_4 =  $response->rows[0]->stockByStore[3]->stock;
//        $assortmentStore->save();
//    }

//    public static function storeModification()
//    {
//        $urlPath = "https://online.moysklad.ru/api/remap/1.1/entity/variant";
//        $encodeAuth =  base64_encode('admin@joinkitekat1:f7cae08f5c');
//
//        $responses = Curl::to($urlPath)
//            ->withHeader('Authorization: Basic '.$encodeAuth)
//            ->asJson()
//            ->get();
//        foreach($responses->rows as $modification){
//            if($hrefProduct = $modification->product->meta->href){
//                $ID = explode('/',$hrefProduct);
//                dd($ID[8]);
//            }
//
//
//        }
//    }


//    public  function downloadImage($list)
//    {
//        if(isset($list->image->meta->href)) {
//            $downloadPath = config('moy-sklad.image.download_path');
//            if(!is_dir($downloadPath)) {
//                mkdir($downloadPath, 0777, true);
//            }
//            $fullName = $list->image->filename;
//            $imagePath = $list->image->meta->href;
//            $img = curl_init($imagePath);
//            curl_setopt($img, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($img, CURLOPT_BINARYTRANSFER, true);
//            curl_setopt($img, CURLOPT_FOLLOWLOCATION , true);
//            curl_setopt($img, CURLOPT_USERPWD, $this->login.':'.$this->password); #--------- логин и пароль
//            $output = curl_exec($img);
//            $info = curl_getinfo($img);
//            $info['url'];
//            Curl::to($info['url'])
//                ->withContentType('image/png')
//                ->download($downloadPath.$fullName);
//            return $fullName;
//        }else{
//            null;
//        }
//    }


}