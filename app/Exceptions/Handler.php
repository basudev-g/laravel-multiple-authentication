<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = Arr::get($exception->guards(),0);

        switch($guard){
            case 'admin':
                $redirect = route('admin.login');
                break;
            default:
                $redirect = route('login');
                break;
        }

        return $this->shouldReturnJson($request, $exception)
                    ? response()->json(['message' => $exception->getMessage()], 401)
                    : redirect()->guest($redirect);
                    // : redirect()->guest($exception->redirectTo() ?? $redirect);
    }
}
