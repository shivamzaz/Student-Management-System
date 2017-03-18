<?php

namespace App\Exceptions;

class UserSuspendedException extends \Exception
{
	/**
	 * The exception message.
	 *
	 * @var string
	 */
	protected $message = 'Your account has been suspended.';
}
