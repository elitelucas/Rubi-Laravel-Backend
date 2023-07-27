<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AcceptedInvitationException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json(
            data: [
                'error' => 'This invitation has already been accepted.',
            ],
            status: 422
        );
    }
}
