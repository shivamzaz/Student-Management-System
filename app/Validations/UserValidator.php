<?php

namespace App\Validations;

use App\Validations\Validator;

class UserValidator extends Validator
{
  /**
   * validation rules
   *
   * @param $type
   * @param $data
   * @return array
   */
  protected function rules($type, $data)
  {
    $rules =  [];

    switch($type)
    {
      case 'create':
        $rules = [
          'full_name'  =>  'required|min:2',
          'email' =>  'required|email|unique:users',
          'password'  =>  'required|min:6',
        ];
        break;

      case 'login':
        $rules = [
          'email' =>  'required|email|exists:users',
          'password' =>  'required|min:6',
        ];
        break;

      case 'forgot-password':
        $rules = [
          'email' =>  'required|email|exists:users'
        ];
        break;

      case 'verify-forgot-password':
        $rules = [
          'hash' =>  'required|min:15|exists:users,forgot_password_hash'
        ];
        break;

      case 'reset-password':
        $rules = [
          'email' =>  'required|email|exists:users',
          'password'  =>  'required|min:6|confirmed',
          'password_confirmation'  =>  'required|min:6'
        ];
        break;

      case 'verify':
        $rules = [
          'hash'  =>  'bail|required|exists:users,verify_hash'
        ];
        break;

      case 'password':
        $rules = [
          'password'  =>  'required|min:6|confirmed',
          'password_confirmation'  =>  'required|min:6',
        ];
        break;

      case 'change-password':
        $rules = [
          'current_password' => 'required',
          'new_password' => 'required|min:6|confirmed',
          'new_password_confirmation' => 'required|min:6'
        ];
        break;
    }
    return $rules;
  }


  /**
   * Get the attributes name.
   *
   * @param $type
   * @return array
   */
  protected function getAttributeNamesForHuman($type)
  {
    $attributes =  [];

    switch($type)
    {
      case 'verify':
        $attributes = [
          'verify_hash' => 'hash',
        ];
        break;
      case 'reset-password':
        $attributes = [
          'api_token' =>  'token'
        ];
        break;

    }
    return $attributes;
  }


  /**
   * Custom validation messages
   *
   * @param $type
   * @return array
   */
  public function messages($type)
  {
    switch($type)
    {
      case 'verify-forgot-password':
        return [
          'hash.*' =>  'Invalid forgot password hash'
        ];
        break;
      case 'reset-password':
        return [
          'api_token.*' =>  'Invalid API Token'
        ];
      default:
        return [];
    }
  }
}
