<?php

namespace App\Exceptions;

use Exception;

class UserVerificationException extends Exception
{
  /**
   * @var $currentHash
   */
  protected $currentHash;


  /**
   * UserVerificationException constructor.
   *
   * @param string $message
   * @param int $currentHash
   */
  public function __construct($message, $currentHash)
  {
    parent::__construct($message);

    $this->currentHash = $currentHash;
  }


  /**
   * get Current Hash when the verification failed
   *
   * @return int
   */
  public function currentHash()
  {
    return $this->currentHash;
  }
}