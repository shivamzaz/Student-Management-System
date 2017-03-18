<?php

namespace App\Exceptions;

class InvalidCredentialsException extends \Exception
{
	/**
	 * The exception message.
	 *
	 * @var string
	 */
	protected $message = 'Wrong Email and Password Combination.';
}
