<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{

    public function getAll()
    {
        return Product::query()->with('productPrice')->get();
    }

    public function create(array $data)
    {
        return Product::query()
            ->create($data);
    }

    public function getById(int $id)
    {
        return Product::query()
        ->where('id', $id)->first();
    }

    public function updateProductById(array $data, int $id)
    {
        $Product = Product::query()
        ->where('id', $id)->firstOrFail();
        $Product->update($data);
        return $Product;
    }

    public function deleteProductByName(string $name)
    {
        $product = Product::query()
        ->where('name', $name)->firstOrFail();
        $product->delete();
        return $product;
    }
}
