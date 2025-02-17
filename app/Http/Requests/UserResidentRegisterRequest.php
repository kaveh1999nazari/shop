<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResidentRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'address' => 'string|nullable',
            'postal_code' => 'string|nullable|numeric',
            'province_id' => 'integer|nullable',
            'city_id' => 'integer|nullable',
        ];
    }

}
