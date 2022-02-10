<?php
namespace App\Services;

use App\Models\User;
use App\Models\company;
use App\Http\Requests\User\StoreUserRequest;
use Hash;
class CreateUserService{

    public function store(array $userParams,Company $company) :User {     
           $User = $company->users()->create($userParams);
             return $User;
      }
}