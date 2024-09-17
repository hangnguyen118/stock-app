<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = array_merge($request->all(), [
            'role' => 1
        ]);
        $user = $this->create($data);
        $token = $user->createToken('apiToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }

    protected function create(array $data)
    {
        //commit test
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role']
        ]);
    }
}