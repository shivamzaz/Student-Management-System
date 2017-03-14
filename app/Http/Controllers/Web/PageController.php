<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
  public function app()
  {
  	return view('pages.app');
  }
}
