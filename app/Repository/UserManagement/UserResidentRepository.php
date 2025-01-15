<?php

namespace App\Repository\UserManagement;

use App\Models\City;
use App\Models\UserResident;

class UserResidentRepository
{
    public function create(array $data): UserResident
    {
        return UserResident::query()
            ->create($data);
    }

    public function checkProvinceCityMatch(int $provinceId, int $cityId): bool
    {
        return City::query()
            ->where('id', $cityId)
            ->where('province_id', $provinceId)
            ->exists();
    }

}
