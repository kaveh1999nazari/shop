<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundDegree extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Degree not found',
        ], 404);
    }

}
