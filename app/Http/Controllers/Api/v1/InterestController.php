<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Interest;

class InterestController extends Controller
{
public function getinterests(){
    return Interest::get();
  }
}
