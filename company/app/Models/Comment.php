<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'comments';


    public function users(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->belongsTo(Posts::class);
    }

}
