<?php

namespace App\Http\Controllers\Api\v1;
use App\Models\User;
use JWTAuth;
use App\Services\UserService;
use App\Transformers\UserTransformer;

class UserController extends Controller{

	public function __construct(UserService $userService)
  {
	   $this->userService = $userService;
  }
  public function register(){
    dd('dffg')
  	$inputs = request()->all();

  	$user=$this->userService->register($inputs);

  	$token = JWTAuth::fromUser($user);

  	$user->token = $token;

  	$user = $this->getTransformedData($user, new UserTransformer);
    //dd('df');

    return response()->success($token);
  }
}