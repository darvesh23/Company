<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Company;
class IndexUserRequest extends FormRequest
{
    
    public function authorize()
    {   
        return (auth()->user()->id == $this->company->users()->first()->id);
    }
    
    
    public function rules()
    {        
        return [
          
        ];
       
    }



}
