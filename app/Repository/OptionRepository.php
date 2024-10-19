<?php

namespace App\Repository;

use App\Models\Option;

class OptionRepository
{
    public function getAllOptions()
    {
        return Option::query()->get();
    }

    public function createOption($data)
    {
        return Option::query()->create($data);
    }

    public function deleteOptionById(int $id)
    {
        return Option::query()->findOrFail($id)->delete();
    }

}
