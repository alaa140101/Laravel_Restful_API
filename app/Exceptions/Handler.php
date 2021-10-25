<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Support\Facades\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return Response::json([
                'error' => [
                    'message' => 'Not found!'
                ]
            ], 404);
        }
        if ($e instanceof MethodNotAllowedHttpException) {
            return Response::json([
                'error' => [
                    'message' => 'Not Supported for this route!'
                ]
            ], 404);
        }
        /*else{
            return Response::json([
                'error' => [
                    'message' => 'Not Supported'
                ]
            ],404);
        }*/
        return parent::render($request, $e);
    }
}
