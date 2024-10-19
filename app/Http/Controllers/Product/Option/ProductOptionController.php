<?php

namespace App\Http\Controllers\Product\Option;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOptionRequest;
use App\Http\Resources\ProductOptionResource;
use App\Models\ProductOption;
use App\Service\ProductOptionService;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    function __construct(protected readonly ProductOptionService $productOptionService){}

    public function getAllProductOptions()
    {
        $productOption = $this->productOptionService->getAllProductOption();
        return ProductOptionResource::collection($productOption);
    }

    public function createProductOption(ProductOptionRequest $request)
    {
        $productOption = $this->productOptionService->createProductOption($request->validated());
        return ProductOptionResource::collection($productOption);
    }

    public function deleteProductOptionById($id)
    {
        $productOption = $this->productOptionService->deleteProductOptionById($id);
        return ProductOptionResource::make($productOption);
    }
}
