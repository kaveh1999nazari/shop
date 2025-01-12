<?php

namespace App\Repository;

use App\Models\UserEducation;

class UserEducationRepository
{
    public function createEducation(array $data): UserEducation
    {
        return UserEducation::query()
                    ->create($data);
    }

}
