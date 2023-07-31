<?php

namespace App\Exceptions;

use App\Traits\ReturnErrorResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAlreadyJoinedWorkspaceException extends Exception
{
    use ReturnErrorResponse;
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return $this->error(
            error: 'The collaborator registered with this email is already joined to the workspace.',
            status: 422
        );
    }
}
