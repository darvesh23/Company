<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash as FacadesHash;

class usersController extends Controller
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
    public function store(Request $request , UserRequest $userRequest)
    {   $logUser = auth()->user();

        if($logUser->company_id != $request->company_id){
            return response()->json(['error'=>"cannot register to another company"]);
        }
        
        $user = User::create([
                'Name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'salary'=>$request->salary,
                'company_id'=>$request->company_id,

            ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $companies->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$companyId,$id, UserRequest $userRequest)
    {
        $us = $user->find($id);

        $logUser = auth()->user();

        if($logUser->company_id != $us->company_id){
            return response()->json(['error'=>"cannot update to another company"]);
        }
        
        $us->where("id", $id)->update([
                'Name' => $request->name,
                'email' => $request->email,
                'password' =>FacadesHash::make($request->password),
                'salary'=>$request->salary,            
               
            ]);

        return response()->json([
            'message' => 'User successfully updated',
            'user' => $us
        ], 201);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$companyId,$id)
    { $use = $user->find($id);
        if($use)
           $use->delete(); 
        else
            return response()->json("User dosn't exist");
        return response()->json("delete"); 
    
}
}