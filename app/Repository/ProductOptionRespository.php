<?php

namespace App\Repository;

use App\Models\ProductOption;

class ProductOptionRespository
{
    public function getAllProductOption()
    {
        return ProductOption::query()->get();
    }

    public function createProductOption(array $data)
    {
        return ProductOption::query()->create($data);
    }

    public function deleteProductOptionById(int $id)
    {
        return ProductOption::query()->findOrFail($id)->delete();
    }

}
