<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\categoriesRequest;

class categoriesController extends Controller
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
    public function store(Request $request,categoriesRequest $categoriesRequest)
    {
        $logUser = auth()->user();

        if($logUser->id != $request->user_id){
            return response()->json(['error'=>"denied{userId}"]);
        }
        
        $cat=categories::create([
            'Name' => $request->Name,
            'user_id'=>$request->user_id,
        ]);
            return response()->json([
                'message' => 'Category successfully created',
                'category' => $cat
            ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories,$userid,$id)
    {
        return categories::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories,$userId,$id ,categoriesRequest $categoriesRequest)
    {
        $cat=$categories->find($id);
        $logUser = auth()->user();

        if($logUser->id != $cat->user_id){
            return response()->json(['error'=>"cannot update to another users category"]);
        }
        
             $cat->where("id",$id)->update([
            'Name' => $request->Name,
            'user_id'=>$request->user_id,
        ]);
            return response()->json([
                'message' => 'Category successfully updated',
                'category' => $cat
            ], 201);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories,$userId,$id)
    {
        $cat = categories::find($id);
        if($cat){
            $cat->delete();
            return response()->json([
            'message' => 'Category destroyed successfully',
            ], 201);
        }
        else {
            return response()->json([
                'message' => 'Category does not exists',
                ], 404);
        }

    }
}
