<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    use SoftDeletes;

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

    public function categories(){
        return $this->hasMany(Category::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function tags(){
        return $this->hasMany(Tag::class);
    }
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function companys(){
        return $this->belongsTo(Company::class);
    }


}