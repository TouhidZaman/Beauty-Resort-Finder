<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function resorts(){
        return $this->hasMany('App\Resort');
    }

    //Making relationship with Role Model
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function booking_histories(){
        return $this->hasMany('App\BookingHistory');
    }

    //this two functions for cheeking roles
    /*
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    public function  hasAnyRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }*/

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }else{
                    if($this->hasRole($roles)){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
}
