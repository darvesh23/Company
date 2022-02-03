<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\commentsRequest;


class commentsController extends Controller
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
    public function create(Request $request,commentsRequest $commentsRequest)
    {
        $logUser = auth()->user();

        if($logUser->id != $request->user_id){
            return response()->json(['error'=>"denied{userId}"]);
        }
        $comm = comments::create([
            'Body' => $request->body,
            'user_id' => $request->userId,
            'post_id'=>$request->postId            

            ]);

        return response()->json([
            'message' => 'commented successfully ',
            'user' => $comm
        ], 201);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments,$userid,$id)
    {
        return $comments->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments,$userId,$id ,commentsRequest $commentsRequest)
    {
        $comm = $comments->find($id);

        $logUser = auth()->user();

        if($logUser->id != $comm->user_id){
            return response()->json(['error'=>"cannot update comment of diff user"]);
        }
        $comm->where("id", $id)->update([
                'Body' => $request->body,
                'user_id' => $request->userId,
                'post_id'=>$request->postId            

            ]);

        return response()->json([
            'message' => 'Succesfully updated',
            'user' => $comm
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments ,$userId,$id)
    {
        $com = $comments->find($id);
        if($com)
           $com->delete(); 
        else
            return response()->json("comment dosn't exist");
        return response()->json("deleted"); 
    }
}
