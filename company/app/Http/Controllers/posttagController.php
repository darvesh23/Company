<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\PostTag\DeletePostTagRequest;
use App\Http\Requests\PostTag\IndexPostTagRequest;
use App\Http\Requests\PostTag\ShowPostTagRequest;
use App\Http\Requests\PostTag\StorePostTagRequest;


class PostTagController extends Controller
{
    public function index(IndexPostTagRequest $request, Post $post)
    {
        return $post->tags;
    }
    
    public function show(ShowPostTagRequest $request, Tag $tag)
    {
        return $tag->posts;
    }

    public function store(StorePostTagRequest $request, Post $post)
    {   
        $posttag = $post->tags()->sync($request->all());
            return response()->json(['message' => 'Tag used in Post successfully ','PostTag' => $posttag], 201);
    }
    

    
 }