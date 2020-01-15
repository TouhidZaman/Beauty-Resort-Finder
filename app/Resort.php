<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    public function resort_category(){
        return $this->belongsTo('App\ResortCategory');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function booking_histories(){
        return $this->hasMany('App\BookingHistory');
    }
}
