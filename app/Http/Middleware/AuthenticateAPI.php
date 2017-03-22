<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Exceptions\UserSuspendedException;

class AuthenticateAPI
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $token = $request->header('Authorization');

    if ($token) {
      $user = User::where('api_token', $token)
                  ->where('api_token_expired_at', '>=', Carbon::now())
                  ->first();

      if ($user) {
        if ($user->is_suspended) {
          throw new UserSuspendedException;
        }

        auth()->onceUsingId($user->id);
      }
    }

    return $next($request);
  }
}
