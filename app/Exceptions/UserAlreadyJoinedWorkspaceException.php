<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAlreadyJoinedWorkspaceException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json(
            data: [
                'error' => 'The collaborator registered with this email is already joined to the workspace.',
            ],
            status: 422,
        );
    }
}
