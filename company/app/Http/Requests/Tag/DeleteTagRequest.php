<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class DeleteTagRequest extends FormRequest
{

    public function authorize()
    {
        return (auth()->user()->id == $this->tag->user_id);

    }

 
    public function rules()
    {
        return [
            //
        ];
    }
}
