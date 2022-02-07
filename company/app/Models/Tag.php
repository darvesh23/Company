<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    protected $table = 'tags';
    use HasFactory;
    use SoftDeletes;


    public $timestamps = false;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->belongsToMany(Post::class,'post_tags');
    }

}
