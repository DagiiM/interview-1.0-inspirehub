<?php

namespace App\Http\Controllers;

use App\Traits\WebResponser;
use App\Traits\ApiResponser;


class WebController extends Controller
{

  use WebResponser,ApiResponser;

  public function __construct()
  {

  }
}
