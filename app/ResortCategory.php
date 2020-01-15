<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResortCategory extends Model
{
    public function resorts(){
        return $this->hasMany('App\Resort');
    }
}
