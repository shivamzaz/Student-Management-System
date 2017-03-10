<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	// field that are mass - assignment
	protected $fillable = [
		'full_name',
		'address',
		'gender',
		'year'
	];

    public function interests()
    {
    	return $this->belongsToMany('App\Models\Interest');
    }
}
