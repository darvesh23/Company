<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {

        return true;
    }

    public function rules()
    {  
        return [
            'name' => 'required|string|min:2|max:100|unique:companies',
            'location'=>'required|string|min:3',
             //'company_id' => 'required|exists:companies,id'
       
        ];
        
    }
}
