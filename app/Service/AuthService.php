<?php

namespace App\Service;


use App\Repository\UserManagement\UserRepository;
use Illuminate\Http\JsonResponse;

class AuthService
{

    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function checkEmailExist(string $email): bool
    {
        return $this->userRepository->checkUserByEmail($email);
    }

    public function findUserByEmail(string $email): ?\App\Models\User
    {
        return $this->userRepository->findUser($email);
    }

    public function login(array $data): JsonResponse
    {
        if (!$token = auth('api')->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
