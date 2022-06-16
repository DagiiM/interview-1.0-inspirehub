<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Ebook;
use App\Models\Ministry;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usersAll=User::all();

      $user = Auth::user();
      
      $users=$usersAll->count();

      $unverifiedAll=$usersAll->where('email_verified_at',0);
      $unverified=$unverifiedAll->count();
      $verified=$users-$unverified; //subtraction

      $ebooks=Ebook::all()->count();
      $videos=Video::all()->count();
      $ministry=Ministry::all()->count();

      return view('dashboard',['videos'=>$videos,'ministry'=>$ministry,'ebooks'=>$ebooks,'users'=>$users,'verified'=>$verified,'unverified'=>$unverified,'user'=>$user]);
    }

}
