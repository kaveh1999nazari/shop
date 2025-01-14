<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserJobRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "user_id" => "required",
            "province_id" => "nullable",
            "city_id" => "nullable",
            "title" => "nullable|string",
            "phone" => "nullable|string",
            "address" => "nullable|string",
            "postal_code" => "nullable|string",
            "monthly_salary" => "nullable|numeric",
            "work_experience_duration" => "nullable|numeric",
            "work_type" => "nullable|string",
            "contract_type" => "nullable|string",
        ];
    }

}
