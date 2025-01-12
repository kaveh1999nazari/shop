<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Repository\UserRepository;

class UserManagementController extends Controller
{

    public function __construct(private readonly UserRepository $userRepository)
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
