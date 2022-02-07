<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    use SoftDeletes;

    protected $table = 'posts';

    public function comments(){
        return $this->hasMany(Comment::class);
    }
        
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function categorys(){
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class,'Post_tags');
    }
}
