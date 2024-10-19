<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotMatchCategory extends Exception
{
    public function render(): JsonResponse{
        return response()->json([
            'message'=>'Not Match',
        ], 401);
}
}
