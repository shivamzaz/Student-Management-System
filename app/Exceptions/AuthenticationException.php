<?php

namespace App\Exceptions;

use Exception;

class AuthenticationException extends Exception
{
  /**
   * @var $email
   * @var $statusId
   * @var $errorCode
   */
  protected $email, $statusId, $errorCode;


  /**
   * AuthenticationException constructor.
   *
   * @param string $message
   * @param int $email
   * @param $statusId
   * @param $errorCode
   */
  public function __construct($message, $email, $statusId, $errorCode)
  {
    parent::__construct($message);

    $this->email = $email;

    $this->statusId = $statusId;

    $this->errorCode = $errorCode;
  }


  /**
   * Get email of the user
   *
   * @return int
   */
  public function email()
  {
    return $this->email;
  }


  /**
   * Get status id of the user
   *
   * @return Exception
   */
  public function statusId()
  {
    return $this->statusId;
  }


  /**
   * Get error code of the user
   *
   * @return mixed
   */
  public function errorCode()
  {
    return $this->errorCode;
  }

}