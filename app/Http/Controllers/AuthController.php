<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->only('login', 'password');
        $user = User::where('email', $credentials['login'])->orWhere('telephone', $credentials['login'])->first();

        if (!$user ||!password_verify($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Login ou mot de passe invalide'], 401);
        }

        $token = $user->createToken('abcdxyz')->accessToken;
        return response()->json(['token' => $token], 200);
    }
}
