<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token', 'token'
    ];

     public static function boot()
     {
        parent::boot();
        static::creating(function ($user) {
            $user->token = str_random(30);
        });
     }

     public function confirmEmail()
     {
        $this->verified = true;
        $this->token = null;
        $this->save();
     }

     public function recipes() {
        return $this->hasMany('App\Models\Recipe');
     }
}
