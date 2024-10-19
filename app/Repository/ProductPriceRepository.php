<?php

namespace App\Repository;

use App\Models\ProductPrice;

class ProductPriceRepository
{
    public function create(array $data)
    {
        return ProductPrice::query()
            ->create([
            'product_id' => $data['product_id'],
            'options' => $data['options'],
            'price' => $data['price'],
        ]);
    }

    public function getById(int $id)
    {
        $productPrice = ProductPrice::query()
            ->where('id', $id)
            ->first();

        $productPrice->options = json_decode($productPrice->options, true);

        return $productPrice;
    }
}
