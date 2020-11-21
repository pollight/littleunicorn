<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'promotion'
            ]
        ];
    }

    public function getProductsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setProductsAttribute($value)
    {
        $this->attributes['products'] = implode(',', $value);
    }

    public static function getPopular(){
        return self::find(4);
    }
}
