<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Hash;

class JWTController extends Controller
{


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(compact('token'));
    }


    public function register(Request $request)
    {   
       
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }
    
    public function profile()
    {
        return response()->json(auth()->user());
    }
    
}