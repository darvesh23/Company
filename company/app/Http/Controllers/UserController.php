<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\company;
use Illuminate\Http\Requests;
use App\Services\CreateUserService;
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
  
     
    public function store(StoreUserRequest $request,CreateUserService $userService ,Company $company) {   
           // dd($request->validated());  
            $user= $userService->store($request->validated(), $company);
            if($user){
            return response()->json([ 'message' => 'User successfully registered', 'User' => $user], 201);
             }                
    }


   
    public function update(UpdateUserRequest $request,Company $company,User $user){  
                
          $User = $user->update($request->validated());
            
          return response()->json(['message' => 'User successfully updated','User' => $User ], 201);
        
    }


    public function destroy(DeleteUserRequest $request,Company $company,User $user){ 
                if($user->delete())
                     return response()->json(['message' => 'User successfully Deleted']); 
    }
}
