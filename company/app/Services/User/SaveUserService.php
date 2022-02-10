<?php
namespace App\Services\User;

use App\Models\User;
use App\Models\company;
use App\Http\Requests\User\StoreUserRequest;
use Hash;
class SaveUserService{

    public function save(array $userParams,Company $company ,$user=null) {     
              if($user == null){    
                     $User = $company->users()->create($userParams);
                     return $User;
               }
               else{
                     $User = $user->update($userParams);
                     return $User;
               }
       }
}