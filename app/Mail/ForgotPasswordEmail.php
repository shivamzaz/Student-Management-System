<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordEmail extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  protected $forgotPasswordHash, $userName;

  /**
   * Create a new message instance.
   *
   * @param $userName
   * @param $forgotPasswordHash
   */
  public function __construct($userName, $forgotPasswordHash)
  {

    $this->userName = $userName;
    $this->forgotPasswordHash = $forgotPasswordHash;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.content.forgot-password-email')
      ->with([
        'userName' =>  $this->userName,
        'forgotPasswordLink' =>  env('APP_URL') . '/'. 'forgot-password/' . $this->forgotPasswordHash
      ]);
  }
}
