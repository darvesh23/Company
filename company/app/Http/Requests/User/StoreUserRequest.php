<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        if($this->has('password')){
            $this->merge(['password' => bcrypt($this->password)]);
         }
        return (auth()->user()->id == $this->company->users()->first()->id );
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'salary'=> 'required|integer|min:3',
        ];
    }
    public function validated()
    {   
        if($this->has('password')){
            $this->merge(['password' => bcrypt($this->password)]);
          }
          return $this->all();
    }
}
