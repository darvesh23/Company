<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexPostRequest extends FormRequest
{
    public function authorize(){
        return (auth()->user()->company_id == $this->user->company_id);
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
