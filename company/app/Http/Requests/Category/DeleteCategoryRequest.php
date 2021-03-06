<?php

namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->category->user_id && auth()->user()->id == $this->user->id);

    }

    public function rules()
    {
        return [
            //
        ];
    }
}
