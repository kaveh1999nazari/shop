<?php

namespace App\Repository;

use App\Models\User;


class AuthRepository{
    public function Register(array $data){
        return User::query()
            ->create($data);
    }
};
