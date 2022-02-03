<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;


    public $timestamps = false;
    protected $guarded = [];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function category(){
        return $this->hasMany(categories::class);
    }
    
    public function comment(){
        return $this->hasMany(comments::class);
    }
    
    public function tag(){
        return $this->hasMany(tags::class);
    }
    
    public function post(){
        return $this->hasMany(posts::class);
    }
    public function company(){
        return $this->belongsTo(companies::class);
    }


}