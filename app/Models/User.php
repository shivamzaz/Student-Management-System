<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'full_name', 'email', 'password',
    ];
     protected $dates = [
    /// use thhis for making the instance
        'api_token_expired_at', 'verify_hash_expired_at', 'forgot_password_hash_expired_at'
    ];
    protected $hidden = [
        'password',
    ];
}
