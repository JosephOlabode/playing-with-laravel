<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = auth()->login($user);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 201);
    }

    public function login(Request  $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentiail = $request->only(['email', 'password']);
        if(!$token = auth()->attempt($credentiail)) {
            return response()->json(['error' => 'Invalid Credentials'], 400);
        }
        $current_user = $request->email;
        return response()->json([
            'access_toke' => $token,
            'token_type' => 'bearer',
            'current_user' => $current_user,
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }

    public function logout(Request $request) {
        auth()->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Logged out Successfully'], 200);
    }
}
