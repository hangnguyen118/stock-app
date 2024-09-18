<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    public function register(RegisterRequest $request)
    {
        $data = array_merge($request->all(), [
            'role' => 1
        ]);
        $user = $this->userRepository->store($data);
        $token = $user->createToken('apiToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);
    }
    // protected function create(array $data)
    // {
        
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //         'role' => $data['role']
    //     ]);
    // }
}