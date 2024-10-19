<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundProduct extends Exception
{
    public function render(): JsonResponse{
        return response()->json([
            'message'=>'Product Not Found',
        ], 404);
}
}