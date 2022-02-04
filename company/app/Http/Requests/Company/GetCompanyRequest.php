<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class GetCompanyRequest extends FormRequest
{
    
    public function authorize()
    {
        $com =$this->company->id;
        return (auth()->user()->company_id == $com);
    }


    public function rules()
    {
        return [
            
        ];
    }
}
