<?php

namespace App\Http\Controllers;

use App\Models\tags;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\tagsRequest;

class tagsController extends Controller
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
    public function create(Request $request)
    {   
        $logUser = auth()->user();

        if($logUser->id != $request->user_id){
            return response()->json(['error'=>"denied"]);
        }
       
        $tag = tags::create([
            'Name' => $request->Name,
            'user_id' => $request->userId,
         
            ]);

        return response()->json([
            'message' => 'tag created successfully ',
            'user' => $tag
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(tags $tags,$userId,$id)
    {
        return $tags->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tags $tags,$userId,$id)
    {
        $tag = $tags->find($id);
        $logUser = auth()->user();

        if($logUser->id != $tag->user_id){
            return response()->json(['error'=>"cannot update to another users tag"]);
        }
        $tag->where("id", $id)->update([
            'Name' => $request->Name,
            'user_id' => $request->userId,
                          ]);

        return response()->json([
            'message' => 'Succesfully updated',
            'user' => $tag
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(tags $tags ,$userId,$id)
    {
        $tag = $tags->find($id);
        if($tag)
           $tag->delete(); 
        else
            return response()->json("tag dosn't exist");
        return response()->json("deleted"); 
    }
}
