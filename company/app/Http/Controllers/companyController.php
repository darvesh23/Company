<?php

namespace App\Http\Controllers;

use App\Http\Requests\companiesRequest;
use App\Models\companies;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use JWTAuth;
use Hash;

class companyController extends Controller
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
    public function store(Request $request,companiesRequest $companiesRequest)
    {
        
            $company=companies::create([
            'name' => $request->name,
            'location' => $request->location,
            'company_id'=>$request->company_id,
        ]);
            return response()->json([
                'message' => 'Company successfully created',
                'company' => $company
            ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies,$id)
    {
        return $companies->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies,$id,companiesRequest $companiesRequest)
    {
        $com=companies::find($id);
        
            $com->where("id",$id)->update([
            'name' => $request->name,
            'location' => $request->location,
            'company_id'=>$request->company_id,
        ]);
            return response()->json([
                'message' => 'Company successfully updated',
                'company' => $com
            ], 201);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies,$id)
    {
        $com = companies::find($id);
        if($com){
            $com->delete();
            return response()->json([
            'message' => 'Company destroyed successfully',
            ], 201);
        }
        else {
            return response()->json([
                'message' => 'Company does not exists',
                ], 404);
        }
    }
}   
