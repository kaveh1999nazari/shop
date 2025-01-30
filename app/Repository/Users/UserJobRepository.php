<?php
namespace App\Repository\Users;

use App\Models\UserJob;

class UserJobRepository
{
    public function create(array $data): UserJob
    {
        return UserJob::query()
            ->create($data);
    }

}
