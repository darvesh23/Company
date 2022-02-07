<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCommentRequest extends FormRequest
{

    public function authorize(){
        return (auth()->user()->id == $this->comment->user_id);
    }

    public function rules(){
        return [
            //
        ];
    }
}
