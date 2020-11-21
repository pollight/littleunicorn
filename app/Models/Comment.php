<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
   public function lead(){
       return $this->hasOne('App\Models\Lead', 'id', 'lead_id');
   }

}
