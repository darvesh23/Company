<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use App\Models\User;

class StorePostRequest extends FormRequest
{
  
    public function authorize(){
    $a = Category::find(request('category_id'))->users->company_id;
   // dd($a);
        return (auth()->user()->id == $this->user->id && auth()->user()->company_id == $a);
    }

  
    public function rules(){
        return [
            'title' => 'required|string|min:2|max:100',
            'body'=>'required|string|',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
