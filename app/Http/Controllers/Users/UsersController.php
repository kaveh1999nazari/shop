<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Repository\Users\UsersRepository;

class UsersController extends Controller
{

    public function __construct(private readonly UsersRepository $userRepository)
    {
    }

    public function register(UserRegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $this->userRepository->Register($request->validated());

        return response()->json([
            'message' => 'User registered successfully',
            'data' => $user
        ]);

    }

}
