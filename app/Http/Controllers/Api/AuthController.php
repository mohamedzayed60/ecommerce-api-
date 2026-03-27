<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            "name" => $request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)

        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

    }

    public function login(Request $request){
        //  Auth::user()->tokens()->delete();
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
       

    }
}
