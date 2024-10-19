<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "uuid" => $this->uuid,
            "product_price_id" => $this->product_price_id,
            "number" => $this->number,
            "total_price" => $this->total_price,
        ];
    }
}
