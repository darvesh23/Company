<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    
    public function authorize(){
       
        return (auth()->user()->id == $this->comment->user_id && auth()->user()->id == $this->user->id);
    }

   
    public function rules(){
        return [
            'body'=>'string',
            'post_id' => 'exists:posts,id'
        ];
    }
}
