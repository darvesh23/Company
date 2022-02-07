<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class ShowTagRequest extends FormRequest
{
  
    public function authorize()
    {
        return (auth()->user()->company_id == $this->user->company_id);
    }


    public function rules()
    {
        return [
            //
        ];
    }
}
