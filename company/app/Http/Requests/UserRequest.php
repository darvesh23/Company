<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\Company;
class UserRequest extends FormRequest
{
    
    public function authorize()
    {   
        //$com = $this->route('companyId');
        $com =$this->company->id;
        
        return (auth()->user()->company_id == $com);
    }
    
    
    public function rules()
    {        
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'salary'=> 'required|integer|min:3',
            //'company_id' => 'exists:companies,id'
        ];
       
    }



}
