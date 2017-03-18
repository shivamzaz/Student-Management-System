<?php

use Carbon\Carbon;


 /**
* Get the class name from the full class path.
*
* @param  string $name
* @return string
*/
function getClassName($name)
{
 return str_replace('_', ' ', snake_case(class_basename($name)));
}

/**
 * Check if client is logged-in.
 * 
 * @return bool
 */
function isLoggedIn()
{
	return auth()->check();
}

/**
 * Get an instance of the logged-in client.
 * 
 * @return \App\Models\Client|null
 */
function getLoggedInUser()
{
	if(isLoggedIn()) {
		return auth()->user();
	}
	return null;
}

/**
 * Get the id of logged-in client.
 * 
 * @return int
 */
function getLoggedInId()
{
	if(isLoggedIn()) {
		return auth()->user()->id;
	}
	return null;
}

/**
 * Get an instance of the gate.
 * 
 * @return \Illuminate\Contracts\Auth\Access\Gate
 */
function gate()
{
	return app(Illuminate\Contracts\Auth\Access\Gate::class);
}

/**
 * Get an instance of the guzzle client.
 * 
 * @param  array $options
 * @return \GuzzleHttp\Client
 */
function guzzle($options = null)
{
	return is_null($options) ? $client = new GuzzleHttp\Client() : new GuzzleHttp\Client($options);
}

/**
 * Generate random string
 *
 * @param int $length
 * @return string
 */
function generateRandomString($length=10)
{
 return bin2hex(openssl_random_pseudo_bytes($length));
}

/**
 * Get timestamp of next month from current timestamp
 *
 * @return mixed
 */
function getNextMonthTimestamp()
{
  return Carbon::now()->addMonth()->toDateTimeString();
}

/**
 * Get timestamp of next $weeks from current timestamp
 *
 * @param $weeks
 * @return mixed
 */
function getNextWeeksTimestamp($weeks)
{
  return Carbon::now()->addWeeks($weeks)->toDateTimeString();
}
