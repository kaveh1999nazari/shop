<?php

namespace App\Http\Controllers\Product\Price;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductOptionValueRequest;
use App\Http\Requests\ProductPriceCreateRequest;
use App\Http\Resources\ProductPriceResource;
use App\Service\ProductPriceService;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    function __construct(protected readonly ProductPriceService $productPriceService){}

    public function createProduct(ProductPriceCreateRequest $request)
    {
        $product = $this->productPriceService->createProduct($request->validated());
        return ProductPriceResource::make($product);
    }


}
