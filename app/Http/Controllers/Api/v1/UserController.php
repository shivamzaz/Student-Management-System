<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\StudentService;
use App\Transformers\StudentTransformer;

class UserController extends Controller{

	public function __construct(UserService $userService)
  {
	   $this->userService = $userService;
  }
}