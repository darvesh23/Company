<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $com =$this->company->id;
        return (auth()->user()->company_id == $com);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  
        return [
            'name' => 'required|string|min:2|max:100',
            'location'=>'required|string|min:3',
           // 'company_id' => 'required|exists:companies,id'
       
        ];
        
    }
}
