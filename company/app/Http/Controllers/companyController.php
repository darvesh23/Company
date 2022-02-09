<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\Company\DeleteCompanyRequest;
use App\Http\Requests\Company\IndexCompanyRequest;
use App\Http\Requests\Company\ShowCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
   
    public function store(StoreCompanyRequest $request ){   
        
        $company =Company::find(Auth::user()->company_id);

        $company=$company->child()->create($request->validated());

         return response()->json(['message' => 'Company successfully created','Company' => $company, ], 201);
    
    }

    public function show(ShowCompanyRequest $request,Company $company){
        return $company;
    }


    public function index(IndexCompanyRequest $request){

        $cid =Company::find(Auth::user()->company_id);
        return $cid->with('child')->where('id', $cid->id)->orWhere('company_id',$cid->id)->get();
    }


    public function update(UpdateCompanyRequest $request ,Company $company){                   
            
            $company= $company->update($request->validated());
            
            return response()->json(['message' => 'Company successfully updated','Company' => $company], 201);
    
    }

   
    public function destroy(DeleteCompanyRequest $DeleteCompanyRequest,Company $company){
        $cat=$company->delete();
        if($cat)
            return response()->json("Deleted");
       
    }
}   
