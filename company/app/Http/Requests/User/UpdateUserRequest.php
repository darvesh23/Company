<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->company->users()->first()->id && auth()->user()->company_id == $this->user->company_id);
    }


    public function rules()
    {
        return [
            
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
