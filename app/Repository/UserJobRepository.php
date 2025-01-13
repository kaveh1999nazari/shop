<?php
namespace App\Repository;

use App\Models\UserJob;

class UserJobRepository
{
    public function create(array $data): UserJob
    {
        return UserJob::query()
            ->create($data);
    }

}
