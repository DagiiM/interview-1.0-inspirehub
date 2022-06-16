<?php

namespace App\Http\Controllers\Chat;

use App\Models\Chat;
use App\Models\Ministry;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

class ChatController extends WebController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Ministry $ministry)
  {
      $user=Auth::user();
      $ministries=$user->ministries;

      return $this->showAll('home.chat.index',$ministries,$ministry,$user);
  }

}
