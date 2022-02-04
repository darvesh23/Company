<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
            $user = $this->post->user_id;
          return(auth()->user()->id == $user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            return [
                'tag_id' => 'required|exists:tags,id',
               // 'postId' => 'required|exists:posts,id',
            ];
        
    }
}
