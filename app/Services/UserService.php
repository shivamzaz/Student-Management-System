<?php namespace App\Services;
use App\Validations\UserValidator;
use App\Repositories\Contracts\UserRepository;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash,
    App\Traits\FormValidationRulesTrait;

use App\Exceptions\ResetPasswordException,
    App\Exceptions\UserSuspendedException,
    App\Exceptions\AuthenticationException,
    App\Exceptions\ChangePasswordException,
    App\Exceptions\UserVerificationException,
    App\Exceptions\InvalidCredentialsException,
    App\Exceptions\ForgotPasswordHashException,
    Illuminate\Support\Facades\Mail,
    App\Mail\UserAccountVerificationEmail,
    App\Mail\ForgotPasswordEmail;
    
class UserService
{
	public function __construct(
    		UserRepository $userRepo
    ){
    	$this->userRepo= $userRepo;
	}


	public function register($inputs , UserValidator $validator)
    {
  		$validator->fire($inputs, 'create');

    	$user = $this->userRepo->create($inputs);

        $this->userRepo->updateStatusId($user, config('core.type.status.not_verified.id'));

        $this->userRepo->updateVerificationHash(
        $user,
        generateRandomString(10),
        getNextWeeksTimestamp(2)
        );

        //$this->sendVerificationEmail($user);

        return $user;
    }

    public function verifyAccount($inputs, UserValidator $validator)
      {
        $validator->fire($inputs, 'verify');

        $hash = $inputs['hash'];

        $user = $this->userRepo->getWhere('verify_hash', $hash)->first();

        if (Carbon::now()->gt($user->verify_hash_expired_at)) {

          // If token has expired
          throw new UserVerificationException('Hash expired', $hash);

        } else {

          // Valid token
          $this->userRepo->updateStatusId($user, config('core.type.status.verified.id'));

          $this->userRepo->updateVerificationHash($user, NULL, NULL);

          return $user;
        }
  }

    public function createPassword($inputs, UserValidator $validator)

      {
        $validator->fire($inputs, 'password');

        $this->userRepo->updatePassword(getLoggedInUser(), Hash::make($inputs['password']));

        return getLoggedInUser();
      }

    public function login($inputs, UserValidator $validator)

      {
        $validator->fire($inputs, 'login');

        $user = $this->userRepo->getWhere('email', $inputs['email'])->first();

        if (Hash::check($inputs['password'], $user->password)) {

          auth()->loginUsingId($user->id);

          return getLoggedInUser();

        }

        throw new AuthenticationException('Wrong Email and Password Combination', $user->email, $user->status_id, 2);
      }


    public function forgotPassword($inputs, UserValidator $validator)
      {

        $validator->fire($inputs, 'forgot-password');

         // dd($inputs);
        
        $user = $this->userRepo->getWhere([ 'email' => $inputs['email']] )->first();
        // getwhere is taking an array values.
         // dd($user->toArray());

        $this->userRepo->updatePasswordVerificationHash(
          $user,
          generateRandomString(15),
          getNextWeeksTimestamp(1)
        );


        $this->sendForgotPasswordEmail($user);
      }

    public function sendForgotPasswordEmail($user)
      {
        Mail::to($user->email)->send(
          new ForgotPasswordEmail (
            $user->name,
            $user->forgot_password_hash
          )
        );

      }

    private function checkAndUpdateToken($user)
      {
        if (! $user->is_token_valid) {
          $this->userRepo->updateToken($user);
        }
      }
    public function validateUserCredentials($inputs, UserValidator $validator)
      {
        $validator->fire($inputs, 'login');

        $valid = auth()->validate(
          array_only($inputs, ['email', 'password'])
        );

        if (! $valid) {
          throw new InvalidCredentialsException;
        }

        $user = $this->userRepo->getWhere([
            'email' =>  $inputs['email']]
            )->first();

        if ($user->is_suspended) {
          throw new UserSuspendedException;
        }

        $this->checkAndUpdateToken($user);

        return $user;
      }

    public function verifyForgotPassword($inputs, UserValidator $validator)
          {
            $validator->fire($inputs, 'verify-forgot-password');

            $user = $this->userRepo->getWhere([
              'forgot_password_hash' => $inputs['hash']
              ])->first();

            //dd($user->forgot_password_hash_expired_at);
            
            if (Carbon::now()->gt($user->forgot_password_hash_expired_at)) {

              // Forgot Password Hash expired
              throw new ForgotPasswordHashException();
            }

            return $user->api_token;
          }

    public function changeStatus($id, $status_id)
      {
        $user = $this->userRepo->get($id);

        $user->status_id = $status_id;

        return $user->save();
      }

     public function resetPassword($inputs, UserValidator $validator)
      {
        $validator->fire($inputs, 'reset-password');

        if ((strcmp(auth()->user()->email, $inputs['email']) === 0) &&
            isset(auth()->user()->forgot_password_hash) &&
            isset(auth()->user()->forgot_password_hash_expired_at))  {

          $this->userRepo->updatePassword(auth()->user(), Hash::make($inputs['password']));

          $this->userRepo->updatePasswordVerificationHash(auth()->user(), null, null);

          return auth()->user();

        } else {

          // Forgot Password Hash not set

          throw new ResetPasswordException();

        }
    }

    public function changePassword($inputs, UserValidator $validator)
      {
        $validator->fire($inputs, 'change-password');

        if (!Hash::check($inputs['current_password'], auth()->user()->password))
          throw new ChangePasswordException('');

        $this->userRepo->updatePassword(auth()->user(), Hash::make($inputs['new_password']));
      }

}
