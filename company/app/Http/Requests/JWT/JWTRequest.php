<?php

namespace App\Http\Requests\JWT;

use Illuminate\Foundation\Http\FormRequest;

class JWTRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }
}
