<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    
    public function authorize(){
        //dd($this->post->user());
        return (auth()->user()->id == $this->post->user_id && auth()->user()->id == $this->user->id);
    }

   
    public function rules(){
        return [
            'title' => 'string|min:2|max:100',
            'body'=>'string',
            'category_id' => 'exists:category,id'
        ];
    }
}
