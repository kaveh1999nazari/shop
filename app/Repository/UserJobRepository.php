<?php

namespace App\Repository;

use App\Models\UserJob;

class UserJobRepository
{
    public function createJob(array $data): UserJob
    {
        return UserJob::query()
            ->create($data);
    }

}
