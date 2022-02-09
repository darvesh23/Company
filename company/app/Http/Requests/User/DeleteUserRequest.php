<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->company->users()->first()->id && auth()->user()->company_id == $this->user->company_id);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
