<?php

namespace App\Service;


use App\Models\User;
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

    public function findUserByEmail(string $email): ?User
    {
        return $this->userRepository->findUser($email);
    }

    public function createOtp(string $email)
    {
        return $this->userRepository->createOtp($email);
    }

    public function login(array $data): JsonResponse
    {
        if (!$token = auth('api')->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function loginByEmail(array $data): JsonResponse
    {
        if (!$token = auth('api')->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
