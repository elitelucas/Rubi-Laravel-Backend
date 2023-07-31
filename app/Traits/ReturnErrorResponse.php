<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ReturnErrorResponse
{
    public function error(string $error, int $status): JsonResponse
    {
        return response()->json(
            data: [
                'error' => $error,
            ],
            status: $status
        );
    }
}
