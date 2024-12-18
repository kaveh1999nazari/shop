<?php

namespace App\Service;

use App\DataTransferObject\ProductCreateDTO;
use App\Repository\ProductPriceRepository;
use App\Repository\ProductRepository;

class ProductService
{

    function __construct(
        protected readonly ProductRepository $productRepository,
        protected readonly ProductPriceRepository $productPriceRepository){}

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function create(ProductCreateDTO $productCreateDTO)
    {
        $imageFiles = [];
        foreach ($productCreateDTO->images as $image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $filePath = $image->storeAs('images', $imageName);
            $imageFiles[] = $filePath;
        }
        $productCreateDTO->images = $imageFiles;

        $product = $this->productRepository->create($productCreateDTO);

        $possibleOptions = $this->cartesian($productCreateDTO->options);

        foreach ($possibleOptions as $possibleOption) {
            $this->productPriceRepository->create([
                'product_id' => $product->id,
                'options' => $possibleOption,
                'price' => $productCreateDTO->price,
            ]);
        }

        return $product;
    }
    function cartesian($input) {
        $result = array();
        foreach ($input as $key => $values) {
            if (empty($values)) {
                continue;
            }
            if (empty($result)) {
                foreach($values as $value) {
                    $result[] = array($key => $value);
                }
            }
            else {
                $append = array();

                foreach($result as &$product) {
                    $product[$key] = array_shift($values);
                    $copy = $product;
                    foreach($values as $item) {
                        $copy[$key] = $item;
                        $append[] = $copy;
                    }
                    array_unshift($values, $product[$key]);
                }
                $result = array_merge($result, $append);
            }
        }
        return $result;
    }
        public function getById(int $id)
        {
            return $this->productRepository->getById($id);
        }

        public function updateProductById(array $data, int $id)
        {
            return $this->productRepository->updateProductById($data, $id);
        }

        public function deleteProductByName(string $name){
            return $this->productRepository->deleteProductByName($name);
        }
}
