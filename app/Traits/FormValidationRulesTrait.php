<?php

namespace App\Traits;

trait FormValidationRulesTrait
{
  /**
   * Rules for validating new user registration
   *
   * @return array
   */
  public function userRegistrationRules()
  {
    return [
      'full_name'  =>  'required|min:2|alpha_space',
      'email' =>  'required|email|unique:users'
    ];
  }
}