<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('apiToken')->plainTextToken;

        if(!$user || !Hash::check($request->password, $user->password)){
            return [
                'message' => 'The provided credentials are incorrect.'
            ];
        }

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    }
}
