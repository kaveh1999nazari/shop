<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class CartEmpty extends Exception
{
    public function render(): JsonResponse{
        return response()->json([
            'message'=>'Empty',
        ], 401);
}
}
