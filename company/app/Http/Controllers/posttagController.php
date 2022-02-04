<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\PostTagRequest;
use App\Http\Requests\PostTagDeleteRequest;


class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post_Tag $Post_Tag,$post_id)
    {
       return Post_Tag::where('post_id',$post_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTagRequest $request , Post $post)
    {   
          /*  */
      
            $comm = $post->tags()->create([
            //'post_id' => $request->postId,
            'tag_id' => $request->tagId,
            ]);
            return response()->json([
                'message' => 'tag inserted in post successfully ',
                'company' => $tag
            ], 201);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_Tag  $Post_Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Post_Tag $Post_Tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_Tag  $Post_Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_Tag $Post_Tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post_Tag  $Post_Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_Tag $Post_Tag)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_Tag  $Post_Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTagDeleteRequest $PostTagDeleteRequest, Post $post ,$tagId)
    {
        $com = $post->tags()->Where(["tag_id",'=', $tagId])->get();
       
        if($com)
           $com->each->delete(); 
        else
            return response()->json("tag not used");
        return response()->json("deleted"); 

    
    }
}
