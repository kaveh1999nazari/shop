<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundCategory extends Exception
{
    public function render(): JsonResponse{
        return response()->json([
            'message'=>'NotFound',
        ], 404);
}
}
