<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }
        $token = $user->createToken('apiToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }
}
