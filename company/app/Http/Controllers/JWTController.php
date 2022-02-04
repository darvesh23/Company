<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Hash;
use App\Http\Requests\JWT\JWTRequest;

class JWTController extends Controller
{


    public function login(JWTRequest $request)
    {
        $arr = [ 'email' => $request->email,'password' => $request->password,];

        if (!$token = JWTAuth::attempt($arr)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(compact('token'));
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