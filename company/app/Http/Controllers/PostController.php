<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\ShowPostRequest;
use App\Http\Requests\Post\IndexPostRequest;

class PostController extends Controller
{
    public function show(ShowPostRequest $request,User $user,Post $post){
        return $post;
    }

    public function index(IndexPostRequest $request,User $user){   
        return $user->posts()->get();
    }

    public function store(StorePostRequest $request,User $user)
    {   
       
            $p=$user->posts()->create($request->validated());
            return response()->json(['message' => 'Post successfully created','Post' => $p ], 201);
    
    }


    public function update(UpdatePostRequest $request,User $user,Post $post)
    {   
       
            $p=$post->update($request->validated());
            return response()->json(['message' => 'Post successfully updated', 'Post' => $p ], 201);
    }

    public function destroy(DeletePostRequest $request,User $user,Post $post)
    {
        if($post->delete())
             return response()->json("Post Deleted Successfully"); 
    }
}
