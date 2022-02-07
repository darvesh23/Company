<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
  
    public function authorize(){
    
        return (auth()->user()->id == $this->user->id);
    }

  
    public function rules(){
        return [
            'body'=>'required|string|',
            'post_id' => 'required|exists:posts,id'
        ];
    }
}