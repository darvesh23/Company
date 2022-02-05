<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->company->users()->first()->id);
    }


    public function rules()
    {
        return [
            
        ];
    }
}
