<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

    $input = $request->validated();


    $credentials = [
        'email' => $input['email'],
        'password' => $input['password'],
    ];

    if (!$token = auth()->attempt($credentials)) {
        return response()->json(['error' => 'Não autorizado'], 401);
    }
    $userId = auth()->id();



    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60,
        'user_id' => $userId
    ]);
    }
    public function me()
    {
        return response()->json(auth()->user());
        
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
