<?php

namespace App\Http\Requests\PostTag;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tag;
    
class StorePostTagRequest extends FormRequest
{
    
    public function authorize()
    {
        $postcom = $this->post->users->company_id;
        $tagcom =  Tag::find(request('tag_id'))->users->company_id;
        return (auth()->user()->id == $this->post->user_id && $postcom == $tagcom);
    }

   
    public function rules()
    {
        return [
            'tag_id' => 'required|exists:tags,id',
        ];
    }
}
