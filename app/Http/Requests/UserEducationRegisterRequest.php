<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEducationRegisterRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "user_id" => "required",
            "university" => "nullable|string",
            "degree_id" => "nullable",
        ];
    }
}
