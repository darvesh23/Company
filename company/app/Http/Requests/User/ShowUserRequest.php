<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ShowUserRequest extends FormRequest
{
   
    public function authorize()
    {
        $com =$this->company->id;
        
        return (auth()->user()->company_id == $com);
    }

   
    public function rules(){
        return [
          
        ];
       
    }
}
