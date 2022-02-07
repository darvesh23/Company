<?php

namespace App\Http\Requests\PostTag;
use Illuminate\Foundation\Http\FormRequest;

class IndexPostTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
