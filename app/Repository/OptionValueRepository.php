<?php

namespace App\Repository;

use App\Models\OptionValue;

class OptionValueRepository
{
    public function getAllOptionValues()
    {
        return OptionValue::query()->get();
    }

    public function createOptionValues($data)
    {
        return OptionValue::query()->create($data);
    }

    public function deleteOptionValuesById(int $id)
    {
        return OptionValue::query()->findOrFail($id)->delete();
    }

}
