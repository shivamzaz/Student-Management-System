<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException as BaseAuthenticationException;
use App\Traits\RestTrait;
use App\Traits\RestExceptionHandlerTrait;
use App\Exceptions\ResetPasswordException;
use App\Exceptions\ChangePasswordException;
use App\Exceptions\AuthenticationException;
use App\Exceptions\UserVerificationException;
use App\Exceptions\ForgotPasswordHashException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException as BaseValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        BaseAuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
      parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     automatic run when throw to exception anywhere, and this place to catch the exception.
     */
    public function render($request, Exception $exception)
    {
      return $this->isApiCall($request) ?
           $this->renderForApi($request, $exception) :
           $this->renderForWeb($request, $exception);
    }


  /**
   * render exception for web
   *
   * @param $request
   * @param $exception
   * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
   */
  public function renderForWeb($request, $exception)
    {
      switch(true)
      {
        case $exception instanceof BaseValidationException:
          return redirect()->back()->withErrors($exception->errors())->withInput($exception->inputs());

        default:
          return parent::render($request, $exception);
      }
    }

  /**
   * @param $request
   * @param $exception
   * @return \Illuminate\Http\JsonResponse
   */
  public function renderForApi($request, $exception)
  {
    switch(true)
    {
      case $exception instanceof BaseValidationException:
        return response()->error(['message' => $exception->getMessage(), 'validations' => $exception->errors()], 422);

      case $exception instanceof ModelNotFoundException:
        return response()->error(['message' => $exception->getMessage() ], 404);

      case ($exception  instanceof UserVerificationException):
          return response()->error(['message' => $exception->getMessage(), 'currentHash' => $exception->currentHash()], 403);

      case ($exception instanceof AuthenticationException):
          return response()->error(['message' =>  $exception->getMessage(), 'email' =>  $exception->email(),
            'statusId' =>  $e->statusId(), 'errorCode' =>  $exception->errorCode()], 403);

      case ($exception instanceof ForgotPasswordHashException):
          return response()->error('Forgot Password Hash Expired', 403);

      case ($exception instanceof ResetPasswordException):
          return response()->error('Invalid Reset Password Attempt', 403);

      case ($exception instanceof UserNotVerifiedException):
          return response()->error($exception->getMessage(), 403);

      case ($exception instanceof ChangePasswordException):
          return response()->error(['message' =>  $exception->getMessage(), 'validations' =>  $exception->errors()], 422);

      case ($exception instanceof InvalidCredentialsException):
          return response()->error($exception->getMessage(), 401);

      case ($exception instanceof UserSuspendedException):
          return response()->error($exception->getMessage(), 401);
          
      default:
        return response()->error($exception->getMessage(), 400);
    }
  }

  /**
   * Convert an authentication exception into an unauthenticated response.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Illuminate\Auth\AuthenticationException  $exception
   * @return \Illuminate\Http\Response
   */
  protected function unauthenticated($request, AuthenticationException $exception)
  {
    if ($request->expectsJson())
    {
      return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    return redirect()->guest('login');
  }


  /**
   * is api call ?
   *
   * @param Request $request
   * @return bool
   */
  protected function isApiCall(Request $request)
  {
    return strpos($request->getUri(), '/api/v') !== false;
  }


}
