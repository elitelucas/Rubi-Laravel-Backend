<?php

namespace App\Exceptions;

use App\Traits\ReturnErrorResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    use ReturnErrorResponse;
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (\InvalidArgumentException $e, Request $request) {
            return $this->error(error: $e->getMessage(), status: $e->getCode());
        });
    }
}
