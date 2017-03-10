<?php
namespace App\Validations;

class UserValidator extends Validator
	{
		public function login(){
			return [
			'email' => 'required',
			'password' => 'required|min:10'
			];
		}
		public function register(){
			return [
			'full_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required| min:6'
			];
		}
}