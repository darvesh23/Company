<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoriesRequest extends FormRequest
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
    {  switch($this->method()){
        case 'POST' :
            return [
                'Name' => 'required|string|min:2|max:100',
                'user_id' => 'exists:users,id'
            ];
        
        case 'PUT' :
            return [
                'Name' => 'required|string|min:2|max:100',
                'user_id' => 'exists:users,id'
            ];
        }
    }
}
