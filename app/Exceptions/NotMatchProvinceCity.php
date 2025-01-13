<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotMatchProvinceCity extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'The provided provinces city is not matched.'
        ], 401);
    }

}
