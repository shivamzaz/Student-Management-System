<?php namespace App\Services;
use App\Validations\UserValidator;
use App\Repositories\Contracts\UserRepository;

class UserService
{
	public function __construct(
		    UserValidator $validator,
    		UserRepository $userRepo
    ){
    	$this->validator =$validator;
    	$this->userRepo= $userRepo;
	}
	public function register($inputs)
    {
  		$this->validator->fire($inputs,'register');

    	$user = $this->userRepo->create($inputs);
       
    return $user;
    }

}