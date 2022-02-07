<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
{

    public function authorize(){
        return (auth()->user()->id == $this->user->id);
    }

    public function rules(){
        return [
            //
        ];
    }
}
