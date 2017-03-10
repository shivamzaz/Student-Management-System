<?php

namespace App\Repositories\Db;

use App\Models\Interest;
use App\Traits\DbRepositoryTrait;
use App\Repositories\Contracts\InterestRepository as InterestRepositoryInterface;


class InterestRepository implements InterestRepositoryInterface{

	protected $model = Interest::class;

	use DbRepositoryTrait;

}
