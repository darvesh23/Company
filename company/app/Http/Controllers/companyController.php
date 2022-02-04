<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequest;
use App\Http\Requests\Company\CompanyPatchRequest;
use App\Http\Requests\Company\CompanyDeleteRequest;

use App\Models\Company;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;

class CompanyController extends Controller
{
   
    public function under(Company $company)
    {
        return $company->with('parent')->where('id', $company->id)->get();
    }

    public function index(Company $company)
    {
        return $company->all();
    }

    public function store(CompanyRequest $request ,Company $company)
    {   
             
        $company=$company->parent()->create([
            'name' => $request->name,
            'location' => $request->location,
          
              ]);
            return response()->json([
                'message' => 'Company successfully created',
                'Company' => $company
            ], 201);
        
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function edit(Company $Company)
    {
        
    }

    public function update(CompanyPatchRequest $request ,Company $company)
    {                  
            $company=$company->update([
            'name' => $request->name,
            'location' => $request->location,
          //  'company_id'=>$request->company_id,
        ]);
            return response()->json([
                'message' => 'Company successfully updated',
                'Company' => $company
            ], 201);
    
    }

   
    public function destroy(CompanyDeleteRequest $CompanyDeleterequest,Company $company)
    {
        $cat=$company->delete();
        if($cat)
            return response()->json("Deleted");
        else 
            return response()->json("Cannot Delete Company");     
    }
}   
