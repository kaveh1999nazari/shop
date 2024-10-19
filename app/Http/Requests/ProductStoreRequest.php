<?php

namespace App\Http\Requests;

use App\Rules\ProductPriceCreateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|unique:products,name',
            'category_id' => 'required',
            'description' => 'nullable|min:2',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'options' => ['required', 'array'],
            'options.*' => ['required', 'array', new ProductPriceCreateRule()],
            'price' => 'required|numeric',
        ];
    }
}
