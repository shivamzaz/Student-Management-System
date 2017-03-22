<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAccountVerificationEmail extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  /**
   * @var $userName
   * @var $verificationHash
   */
  protected $userName, $verificationHash;

  /**
   * Create a new message instance.
   *
   * @param $userName
   * @param $verificationHash
   */
  public function __construct($userName, $verificationHash)
  {
    $this->userName = $userName;
    $this->verificationHash = $verificationHash;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.content.account-verification-email')
      ->with([
        'userName' =>  $this->userName,
        'verificationLink' =>  env('APP_URL') . '/'. 'verify-account/' . $this->verificationHash
      ]);
  }
}
