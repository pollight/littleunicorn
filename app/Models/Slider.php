<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    public function getImgAttribute($value)
    {
        return '../storage/'.$value;
    }

}
