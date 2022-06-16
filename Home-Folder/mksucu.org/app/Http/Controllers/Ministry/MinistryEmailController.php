<?php

namespace App\Http\Controllers\Ministry;

use App\Models\Ministry;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;

class MinistryEmailController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,email')->only('create','store');
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Ministry $ministry)
  {
    $emails=$ministry->users()->get(['email'])->pluck('email')->values()->unique();

    return view('home.ministry.emails.create',['emails'=>$emails]);
  }
}
