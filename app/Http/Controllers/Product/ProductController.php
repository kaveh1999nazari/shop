<?php

namespace App\Http\Controllers\Product;

use App\DataTransferObject\ProductCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\mappers\ProductPrice\ProductPriceCreateMapper;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(protected readonly ProductService $productService)
    {
    }

    public function getAll()
    {
        $category = $this->productService->getAll();
        return ProductResource::collection($category);
    }

    public function create(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $dto = new ProductCreateDTO(
            $data['name'],
            $data['description'] ?? null,
            $data['images'] ?? null,
            $data['category_id'],
            $data['options'],
            $data['price'],
        );
        $product = $this->productService->create($dto);
        return new ProductResource($product);
    }

    public function getById(int $id)
    {
        $category = $this->productService->getById($id);
        return ProductResource::make($category);
    }

    public function updateProductById(ProductStoreRequest $request, int $id)
    {
        $data = $request->validated();
        $category = $this->productService->updateProductById($data, $id);
        return ProductResource::make($category);
    }

    public function deleteProductByName(string $name)
    {
        $category = $this->productService->deleteProductByName($name);
        return ProductResource::make($category);
    }
}
