<?php

namespace App\Repositories\Db;

use App\Models\User;
use App\Traits\DbRepositoryTrait;
use App\Repositories\Contracts\UserRepository as UserRepositoryInterface;
use App\Exceptions\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface{

	protected $model = User::class;
	
	use DbRepositoryTrait;	
} 