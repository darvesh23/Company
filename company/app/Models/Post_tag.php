<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_tag extends Model
{   
    protected $table = 'post_tags';
    use SoftDeletes;

    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

}
