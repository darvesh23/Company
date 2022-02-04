<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\Company\DeleteCompanyRequest;
use App\Http\Requests\Company\GetCompanyRequest;
use App\Http\Requests\Company\GetAllCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;

class CompanyController extends Controller
{
   
    public function under(GetCompanyRequest $request,Company $company)
    {
        return $company->with('child')->where('id', $company->id)->get();
    }

    

    public function store(StoreCompanyRequest $request ,Company $company)
    {   
             
        $company=$company->child()->create([
            'name' => $request->name,
            'location' => $request->location,
             ]);

              $id=$company->id;

             $admin= $company->users()->create(([
                "name" => $request->name."admin",
                "salary" => 0,
                "password" => bcrypt("12345678"),
                "email" => $request->name."admin@gmail.com",
                "company_id"=>$id
            ]));

            return response()->json([
                'message' => 'Company successfully created',
                'Company' => $company,
                'Admin' => $admin
            ], 201);

           
        
    }

    public function show(GetCompanyRequest $request,Company $company)
    {
        return $company;
    }


    public function index(GetAllCompanyRequest $request,Company $company)
    {
        return $company->all();
    }


    public function update(UpdateCompanyRequest $request ,Company $company)
    {                   
        
        $input=[];
        if($request->has('name')){
            $input['name']=$request->name;
        }
        if($request->has('location')){
            $input['location']=$request->location;
        }
       $company= $company->update($input);
    
            return response()->json([
                'message' => 'Company successfully updated',
                'Company' => $company
            ], 201);
    
    }

   
    public function destroy(DeleteCompanyRequest $DeleteCompanyRequest,Company $company)
    {
        $cat=$company->delete();
        if($cat)
            return response()->json("Deleted");
        else 
            return response()->json("Cannot Delete Company");     
    }
}   
