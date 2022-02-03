<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  switch($this->method()) {
        case 'POST':
        return [
            'name' => 'required|string|min:2|max:100',
            'location'=>'required|string|min:3',
            'company_id' => 'required|exists:companies,id'
       
        ];
        case 'PUT':
            return [
                'name' => 'required|string|min:2|max:100',
                'location'=>'required|string|min:3',
                'company_id' => 'required|exists:companies,id'
               ];    
            }
    }
}
