<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    public function resort(){
        return $this->belongsTo('App\Resort');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
