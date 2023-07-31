<?php

namespace App\Exceptions;

use App\Traits\ReturnErrorResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvitationNumberExceeded extends Exception
{
    use ReturnErrorResponse;
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return $this->error(error: 'You have no more invitations on your subscription.', status: 422);
    }
}
