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
        return $post->tags()->get();
    }
    
    public function show(ShowPostTagRequest $request, Tag $tag)
    {
        return $tag->posts()->get();
    }

    public function store(StorePostTagRequest $request, Post $post)
    {
        $posttag = $post->tags()->attach(['tag_id' => $request->tag_id,]);
            return response()->json(['message' => 'Tag used in Post successfully ','PostTag' => $posttag], 201);
    }
    

    public function destroy(DeletePostTagRequest $request, Post $post,Tag $tag)
    {
        $posttag = $post->tags()->detach($tag);
            return response()->json([ 'message' => 'Tag removed from Post successfully ','PostTag' => $posttag], 201);
    }
 }