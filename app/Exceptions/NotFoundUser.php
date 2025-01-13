<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundUser extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'User not found'], 404
        );

    }

}
