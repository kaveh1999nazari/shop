<?php

namespace App\Repository\UserManagement;

use App\Models\UserEducation;

class UserEducationRepository
{
    public function create(array $data): UserEducation
    {
        return UserEducation::query()
                    ->create($data);
    }

}
