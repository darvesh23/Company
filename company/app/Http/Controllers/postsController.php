<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Controllers\postsController;


class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,postsController $postsController)
    {   
        $logUser = auth()->user();

        if($logUser->id != $request->user_id){
            return response()->json(['error'=>"denied{userId}"]);
        }
        
            $p=posts::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
        ]);
            return response()->json([
                'message' => 'Post successfully created',
                'company' => $p
            ], 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $posts,$userid,$id)
    {
        return posts::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts,$userId,$id,postsController $postsController)
    {
        
        $p=$posts->find($id);

        $logUser = auth()->user();

        if($logUser->id != $p->user_id){
            return response()->json(['error'=>"cannot update to another users post"]);
        }

        $posted = $posts->where("id",$id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
        ]);
            return response()->json([
                'message' => 'Post successfully updated',
                'post' => $posted
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts,$userId,$id)
    {
        $post = posts::find($id);
        if($post){
            $post->delete();
            return response()->json([
            'message' => 'Post destroyed successfully',
            ], 201);
        }
        else {
            return response()->json([
                'message' => 'Post does not exists',
                ], 404);
        }
    }
}
