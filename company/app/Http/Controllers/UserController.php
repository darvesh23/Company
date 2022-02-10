<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\company;
use Illuminate\Http\Requests;
use App\Services\User\SaveUserService;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;

class UserController extends Controller
{
    
    public function show(ShowUserRequest $request,Company $company,User $user){
        return $user;
    }

    public function index(IndexUserRequest $request,Company $company){   
        return $company->users()->get();
    }
  
     
    public function store(StoreUserRequest $request,SaveUserService $userService ,Company $company) {   
           // dd($request->validated());  
            $user= $userService->save($request->validated(), $company);
            if($user){
            return response()->json([ 'message' => 'User successfully registered', 'User' => $user], 201);
             }                
    }


   
    public function update(UpdateUserRequest $request,SaveUserService $userService,Company $company,User $user){  
           
        $user= $userService->save($request->validated(),$company, $user);
        if($user){
          return response()->json(['message' => 'User successfully updated','User' => $user ], 201);
        }
        
    }


    public function destroy(DeleteUserRequest $request,Company $company,User $user){ 
                if($user->delete())
                     return response()->json(['message' => 'User successfully Deleted']); 
    }
}
