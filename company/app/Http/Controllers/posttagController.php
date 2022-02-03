<?php

namespace App\Http\Controllers;

use App\Models\post_tags;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\posttagsRequest;


class posttagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
       return post_tags::where('post_id',$post_id)->get();
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
    public function store(Request $request)
    {   
            $user = posts::find($request->postId)->user_id;
            $logUser = auth()->user();

            if($logUser->id != $user){
                return response()->json(['error'=>"denied{userId}"]);
            }
      
            $tag=post_tags::create([
            'post_id' => $request->postId,
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
     * @param  \App\Models\post_tags  $post_tags
     * @return \Illuminate\Http\Response
     */
    public function show(post_tags $post_tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post_tags  $post_tags
     * @return \Illuminate\Http\Response
     */
    public function edit(post_tags $post_tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post_tags  $post_tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post_tags $post_tags)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post_tags  $post_tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(post_tags $post_tags,$postId,$tagId)
    {
        $com = $post_tags->where("post_id",'=', $postId)->get()->Where(["tag_id",'=', $tagId]);
       
        if($com)
           $com->each->delete(); 
        else
            return response()->json("tag not used");
        return response()->json("deleted"); 

    
    }
}
