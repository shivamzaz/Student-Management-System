<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Services\UserService;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
  /**
   * @var UserService
   */
  protected $userService;


  /**
   * UsersController constructor.
   *
   * @param UserService $userService
   */
  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }


  /**
   * Register a new user
   *
   * @param Request request()
   */
  
  public function register()
  {
    $inputs = request()->all();

    $user = app()->call([$this->userService, 'register'], ['inputs' => $inputs]);

    $user->makeVisible(['api_token', 'api_token_expired_at']);

    auth()->onceUsingId($user->id);

    return response()->success(['user' => $user]);
  }


  /**
   * Verify user
   *
   * @param Request request()
   * @return mixed
   */
  public function verifyAccount()
  {
    $inputs = request()->all();

    $response = app()->call([$this->userService, 'verifyAccount'], ['inputs' => $inputs]);

    return response()->success(['user' => $response]);
  }


  /**
   * Retry user verification
   *
   * @param Request request()
   * @return mixed
   */
  public function retryAccountVerification()
  {
    $inputs = request()->all();

    app()->call([$this->userService, 'retryAccountVerification'], ['inputs' => $inputs]);

    return response()->success([]);
  }


  /**
   * Create password
   *
   * @param Request request()
   * @return mixed
   */
  public function createPassword()
  {
    $inputs = request()->all();

    $response = app()->call([$this->userService, 'createPassword'], ['inputs' => $inputs]);

    return response()->success(['user' => $response]);
  }


  /**
   * Authenticate user
   *
   * @param Request request()
   * @return mixed
   */
  public function login()
  {
    $inputs = request()->all();

    $user = app()->call([$this->userService, 'validateUserCredentials'], ['inputs' => $inputs]);

    $user->makeVisible(['api_token', 'api_token_expired_at']);

    auth()->onceUsingId($user->id);

    return response()->success(['user' => $user]);
  }


  /**
   * Generate Forgot password hash
   * Send email
   *
   * @param Request request()
   * @return mixed
   */
  public function forgotPassword()
  {
    $inputs = request()->all(); 

    app()->call([$this->userService, 'forgotPassword'], ['inputs' => $inputs]);

    return response()->success([]);
  }


  /**
   * Verify Forgot Password Hash
   *
   * @param Request request()
   * @return mixed
   */
  public function verifyForgotPassword()
  {
    $inputs = request()->all();

    $response = app()->call([$this->userService, 'verifyForgotPassword'], ['inputs' => $inputs]);

    return response()->success(['apiToken' => $response]);
  }


  /**
   * Reset password
   *
   * @param Request request()
   * @return mixed
   */
  public function resetPassword()
  {
    $inputs = request()->all();

    $response = app()->call([$this->userService, 'resetPassword'], ['inputs' => $inputs]);

    return response()->success(['user' => $response]);
  }


  /**
   * Get Auth user
   *
   * @return mixed
   */
  public function getAuthUser()
  {
    return response()->success(['user' => auth()->user()]);
  }


  /**
   * Change password
   *
   * @param Request request()
   * @return mixed
   */
  public function changePassword()
  {
    $inputs = request()->all();

    app()->call([$this->userService, 'changePassword'], ['inputs' => $inputs]);

    return response()->success([]);

  }


}
