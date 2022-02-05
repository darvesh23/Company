<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserPatchRequest extends FormRequest
{
   
    public function authorize()
    {
        $com =$this->company->id;
        
        return (auth()->user()->company_id == $com);
    }

   
    public function rules(){
       
    }
}
