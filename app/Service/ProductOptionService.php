<?php

namespace App\Service;

use App\Models\ProductOption;
use App\Repository\ProductOptionRespository;

class ProductOptionService
{
    function __construct(protected readonly ProductOptionRespository $productOptionRespository){}

    public function getAllProductOption()
    {
        return $this->productOptionRespository->getAllProductOption();
    }

    public function createProductOption(array $data)
    {
        return $this->productOptionRespository->createProductOption($data);
    }

    public function deleteProductOptionById(int $id)
    {
        return $this->productOptionRespository->deleteProductOptionById($id);
    }

}
