<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryPatchRequest;

class CategoryController extends Controller
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
    public function store(CategoryRequest $request,User $user)
    {
       
        
        $cat=$user->categorys()->create([
            'Name' => $request->Name,
          //  'user_id'=>$request->user_id,
        ]);
            return response()->json([
                'message' => 'Category successfully created',
                'Category' => $cat
            ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category,$userid,$id)
    {
        return $Category->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPatchRequest $request,User $user,$id)
    {
       
        
        $cat=$user->categorys()->where('id', $id)->update([
            'Name' => $request->Name,
            //'user_id'=>$request->user_id,
        ]);
            return response()->json([
                'message' => 'Category successfully updated',
                'Category' => $cat
            ], 201);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryRequest $request,User $user,$id)
    {
      
        
        $cat=$user->categorys()->find($id)->delete();

        return response()->json("deleted"); 
      
    }
}
