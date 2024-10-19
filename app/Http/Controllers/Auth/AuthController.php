<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repository\AuthRepository;
use App\Service\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function __construct(protected readonly AuthRepository $authRepository, protected readonly AuthService $authService) {}

    public function register(RegisterRequest $request)
    {
        $data = $this->authRepository->register($request->validated());
        return response()->json([
            'message' => 'created successfully',
            'data' => $data
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->only('mobile', 'password');
        return $this->authService->login($data);
    }
}
