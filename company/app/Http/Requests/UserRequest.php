<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Exception;
use App\Models\companies;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
       // $com = $this->route()->parameter('companyId'); // whatever the parameter is called
        
        return true;//(auth()->user()->company_id == $com);
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        switch($this->method()) {
        case 'POST':
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'salary'=> 'required|integer|min:3',
            'company_id' => 'exists:companies,id'
        ];
        case 'PUT':
            return [
                'name' => 'required|string|min:2|max:100',
                'email' => 'required|string|email|max:100',
                'password' => 'required|string|min:6',
                'salary'=> 'required|integer|min:3',
               ];    
        }
    }



}
