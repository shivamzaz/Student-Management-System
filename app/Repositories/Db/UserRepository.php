<?php

namespace App\Repositories\Db;

use App\Models\User;
use App\Traits\DbRepositoryTrait;
use App\Repositories\Contracts\UserRepository as UserRepositoryInterface;
use App\Exceptions\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
class UserRepository implements UserRepositoryInterface{

	
	use DbRepositoryTrait;	

	protected $model = User::class;


  /**
   * Create user
   *
   * @param array $data
   * @return \Illuminate\Database\Eloquent\Model|void
   */

  public function create(array $data)
  {
    $user = User::create($data);

    $user->api_token = generateRandomString();
    $user->api_token_expired_at = getNextMonthTimestamp();
    $user->password = Hash::make($data['password']);
    $user->save();

    return $user;
  }


  /**
   * Update Status Id
   *
   * @param $user
   * @param $statusId
   */
  public function updateStatusId($user, $statusId)
  {
    $user->status_id = $statusId;
    $user->save();
  }


  /**
   * Update new verification hash and expiry time
   *
   * @param $user
   * @param $hash
   * @param $timestamp
   */
  public function updateVerificationHash($user, $hash, $timestamp)
  {
    $user->verify_hash = $hash;
    $user->verify_hash_expired_at = $timestamp;
    $user->save();
  }


  /**
   * Update password
   *
   * @param $user
   * @param $password
   */
  public function updatePassword($user, $password)
  {
    $user->password = $password;
    $user->save();
  }


  /**
   * Update new password verification hash and expiry time
   *
   * @param $user
   * @param $hash
   * @param $hashExpiredAt
   */
  public function updatePasswordVerificationHash($user, $hash, $hashExpiredAt)
  {
    $user->forgot_password_hash = $hash;
    $user->forgot_password_hash_expired_at = $hashExpiredAt;
    $user->save();
  }

  /**
   * Updates the token and it's expiry.
   * 
   * @param  \App\Models\User $user
   * @return bool
   */
  public function updateToken($user)
  {
    $user->api_token = generateRandomString();

    $user->api_token_expired_at = getNextMonthTimestamp();

    return $user->save();
  }


  /**
   * Attach user vote to the poll.
   * 
   * @param  \App\Models\User $user
   * @param  array $inputs
   * @return void
   */
  public function attachVote($user, $inputs)
  {
    $user->options()->attach(
      array_get($inputs, 'option_id')
    );
  }


  /**
   * Detach user vote from the poll.
   * 
   * @param  \App\Models\User $user
   * @param  \App\Models\Poll $poll
   * @return void
   */
  public function detachVote($user, $poll)
  {
    $user->options()->detach(
      $poll->options()->pluck('id')
    );
  }

  public function getByEmail($email)
  { 
    return User::where('email', $email)->first();
  }
} 