<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class IndexCommentRequest extends FormRequest
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
