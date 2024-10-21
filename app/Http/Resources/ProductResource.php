<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'images' => $this->images,
            'product_prices' => $this->productPrice->map(function($productPrice) {
                return [
                    'id' => $productPrice->id,
                    'options' => $productPrice->options,
                    'price' => $productPrice->price,
                ];
            }),
            ];
    }
}

