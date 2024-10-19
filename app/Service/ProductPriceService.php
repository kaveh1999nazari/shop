<?php

namespace App\Service;

use App\Repository\ProductPriceRepository;

class ProductPriceService
{
    function __construct(protected readonly ProductPriceRepository $productPriceRepository){}

    public function createProduct(array $data)
    {
        return $this->productPriceRepository->create($data);
    }

}
