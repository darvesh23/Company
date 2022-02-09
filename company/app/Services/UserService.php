<?php
namespace App\Services;

use App\Models\User;
use App\Models\company;
use App\Http\Requests\User\StoreUserRequest;
use Hash;
class UserService{

    public function store(StoreUserRequest  $request,Company $company) :User {     
          if($request->has('password')){
                $request->merge(['password' => Hash::make($request->password)]);
          }
             $User = $company->users()->create($request->validated());

             return $User;
      }
}