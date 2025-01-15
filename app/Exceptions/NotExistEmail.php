<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotExistEmail extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'this email does not exist'
        ], 401);
    }
}
