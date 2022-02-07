<?php

namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->category->user_id);

    }

    public function rules()
    {
        return [
            //
        ];
    }
}
