<?php

namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        //dd($this->category->users()->id);
        return (auth()->user()->id == $this->category->user_id);
    }

    public function rules()
    {
        return [
            'name' => 'string|min:2|max:100'
        ];
    }
}
