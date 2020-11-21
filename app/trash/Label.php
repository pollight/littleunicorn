<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Product;

class Label extends Model
{
    use Sluggable;
    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
    public function getProducts(){
        return Product::where('label_id',$this->id)->get();
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
