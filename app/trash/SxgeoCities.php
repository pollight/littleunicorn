<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SxgeoCities extends Model
{
    //
    protected $table = 'sxgeo_cities';

    public function region(){
        return $this->belongsTo('App\Models\SxgeoRegions', 'region_id', 'id');
    }

}
