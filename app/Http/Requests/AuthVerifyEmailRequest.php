<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthVerifyEmailRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        ];
    }

}
