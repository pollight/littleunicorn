<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = ['name','reserve','inTransit'];



    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_store', 'product_id', 'store_id');
    }
}
