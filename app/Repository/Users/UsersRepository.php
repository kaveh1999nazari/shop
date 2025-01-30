<?php

namespace App\Repository\Users;

use App\Models\User;


class UsersRepository
{
    public function Register(array $data): User
    {
        return User::query()
            ->create($data);
    }

    public function checkUserByEmail(string $email): bool
    {
        return User::query()
            ->where('email', $email)
            ->exists();
    }

    public function findUser(?string $email = null , ?string $mobile = null): ?User
    {
        return User::query()
            ->where('email', $email)
            ->OrWhere('mobile', $mobile)
            ->first();
    }

    public function createOtp(string $email): int
    {
        return User::query()
            ->where('email', $email)
            ->update([
                'otp_code' => rand(100000, 999999),
                'otp_expired_at' => now()->addMinutes(3)
            ]);
    }

    public function confirmOtp(array $data)
    {
        return User::query()
            ->where('email', $data['email'])
            ->where('otp_code', $data['otp_code'])
            ->first();
    }

}
