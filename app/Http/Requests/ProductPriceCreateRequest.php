<?php

namespace App\Http\Requests;

use App\Rules\ProductPriceCreateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductPriceCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|string',
            'options' => ['required', 'array'],
            'options.*' => ['required', 'array', new ProductPriceCreateRule()],
            'price' => 'required|numeric',
        ];
    }
}
