<?php

namespace App\Repository;

use App\Models\User;


class UserRepository{
    public function Register(array $data){
        return User::query()
            ->create($data);
    }
};
