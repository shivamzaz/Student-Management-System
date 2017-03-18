<?php

namespace App\Exceptions;

use Exception;

class ChangePasswordException extends Exception
{

  protected $message, $errors;

  public function __construct($message)
  {
    $this->message = $message;
  }

  public function message()
  {
    return $this->message();
  }

  public function errors()
  {
    return [
      'current_password'  =>  [
        0 =>  'Password provided does not match with the one associated with this account'
      ]
    ];
  }

}