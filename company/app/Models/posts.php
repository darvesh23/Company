<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function comment(){
        return $this->hasMany(comments::class);
    }
    
    public function tag(){
        return $this->hasMany(tags::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(categories::class);
    }
    
    public function tags(){
        return $this->belongsToMany(tags::class,'post_tags');
    }
}
