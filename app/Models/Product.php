<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    //
    use Sluggable;

    private $discount;
    private $imgs;
    private $salePrice;

//    public function __construct()
//    {
//        if()
//            product
//
//        if(session('showViewProduct') != null){
//            $arr = session('showViewProduct');
//            dd($this->id);
//            array_push($arr,$this->id);
//            session([ 'showViewProduct' => $arr ]);
//        }else{
//            session([ 'showViewProduct' => [$this->id] ]);
//        }
//    }

    private function getImg($picturePath){
        if($picturePath){
            $this->imgs = $picturePath;
            return  json_decode($picturePath);
        }
            $this->imgs = $picturePath;
        return null;
    }
    public function getActionCategory(){
        if($this->category->category){
            return url('/').'/product/'.$this->category->category->slug.'/'.$this->category->slug.'/'.$this->slug;
        }
            return url('/').'/product/'.$this->category->slug.'/'.$this->slug;
    }
    public function getSalePricesAttribute($value)
    {
        return json_decode($value);
    }

    public function getOldPrice(){
        return $this->salePrices[0]->value/100;
    }
    public function getDiscount(){
        foreach($this->salePrices as $key=>$salePrice){
            if($salePrice->value > 0 && $key!=0 ){
                return $salePrice;
            }
        }
        return null;
    }
    public function getPrice(){

        if($this->discount != null){

            return ($this->price/$this->discount)*100;
        }
            return $this->price;
    }
    public function getDiscountCount(){
        return $this->getDiscount()->value;
    }

    public function getImageAttribute($picturePath)
    {
       if($pictures = $this->getImg($picturePath)){
           $path = Storage::url( current($pictures) );
           return $path;
       }
       return '../'.config('app.image.no_image');
    }
    public function getImagesAttribute()
    {
        $this->image;
        if($pictures = $this->getImg($this->imgs)){
           return $pictures;
        }
        else{
           return [];
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment', 'product_id', 'id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getExcerpt(){
       return  Str::limit($this->description, config('app.str_limit.category'));
    }
    public function modifications(){
        return $this->belongsToMany('App\Models\Modification', 'modification_product', 'product_id', 'modification_id');
    }

    public function getOptionsAttribute($extra)
    {
        return array_values(json_decode($extra, true) ?: []);
    }


    public function setOptionsAttribute($extra)
    {
        $this->attributes['options'] = json_encode(array_values($extra));
    }
}



//    Связь для будущего функционала
//    public function stores()
//    {
//        return $this->belongsToMany('App\Models\Store', 'product_store', 'product_id', 'store_id');
//    }




//    public function getImage(){
//
//        $images = $this->images;
//        if($images==null){
//            return '/img/no-image.png';
//        }
//        if(array_key_exists(0, $images) ){
//            return '/storage/'.$images[0];
//        }else{
//            return null;
//        }
//    }
//    public function label(){
//        return $this->belongsTo('App\Models\Label');
//    }
//    public function priceOrDescount(){
//        if($this->discount != null){
//            return $this->price_discount;
//        }else{
//            return $this->price;
//        }
//    }


