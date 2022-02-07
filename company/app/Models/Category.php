<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{       //protected $table = 'categories';

    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    use SoftDeletes;


    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
