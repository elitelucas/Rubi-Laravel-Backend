<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvitationNumberExceeded extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json(
            data: [
                'error' => 'You have no more invitations on your subscription.',
            ],
            status: 422,
        );
    }
}
