<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CompanyObserver;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public $admin;

    use SoftDeletes;

    public function users(){
        return $this->hasMany(User::class);
    }
    
 
    public function child(){
        return $this->hasMany(Company::class,'company_id');
    }
    
    public function parent(){
        return $this->belongsTo(Company::class,'company_id');
    }


}
