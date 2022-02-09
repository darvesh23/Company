<?php

namespace App\Http\Requests\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
  
    public function authorize(){
        $a = Post::find(request('post_id'))->users->company_id;
        return (auth()->user()->id == $this->user->id && auth()->user()->company_id == $a);
    }

  
    public function rules(){
        return [
            'body'=>'required|string|',
            'post_id' => 'required|exists:posts,id'
        ];
    }
}
