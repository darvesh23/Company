<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class posttagsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
            return [
                'tagId' => 'required|exists:tags,id',
                'postId' => 'required|exists:posts,id',
            ];
        }
    }
}
