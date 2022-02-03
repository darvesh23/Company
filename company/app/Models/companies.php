<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function user(){
        return $this->hasMany(User::class);
    }
    
 
    public function parent(){
        return $this->hasMany(companies::class,'company_id');
    }
    
    public function children(){
        return $this->belongsTo(companies::class,'company_id');
    }
}
