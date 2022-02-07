<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryRequest extends FormRequest
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
