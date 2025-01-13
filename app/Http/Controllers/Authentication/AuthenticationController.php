<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Repository\UserRepository;
use App\Service\AuthService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function __construct(private readonly AuthService $authService) {}

    public function login(Request $request)
    {
        $data = $request->only('mobile', 'password');
        return $this->authService->login($data);
    }
}
