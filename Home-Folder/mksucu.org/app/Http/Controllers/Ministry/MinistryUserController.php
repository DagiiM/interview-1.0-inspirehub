<?php

namespace App\Http\Controllers\Ministry;

use App\Http\Controllers\WebController;
use App\Models\Ministry;
use PDF;
use Illuminate\Support\Facades\DB;

class MinistryUserController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-list,user')->only('index','pdf');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ministry $ministry)
    {
      $users=$ministry->users()->get();

       //Where a search is Performed
       if (request()->has('search') != '')
       {
       $search_text = $_GET['search'];

       $users = DB::table('users')
                       ->Select(['id','firstname','lastname','mobile','reg_number','verified','email','deleted_at'])
                       ->where('Firstname', 'like', '%'.$search_text.'%')
                       ->orWhere('Lastname', 'like', '%'.$search_text.'%')
                       ->orWhere('Mobile', 'like', '%'.$search_text.'%')
                       ->orWhere('Email', 'like', '%'.$search_text.'%')
                       ->orderBy('ID', 'desc')
                       ->distinct()
                       ->get();
  
       if($users->isEmpty()){
           return $this->showMessage('warning','The User { '.$search_text.' } Does not Exist');
           }
       }
       

      return $this->showAll('home.ministry.user.index',$users,$ministry);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(Ministry $ministry)
    {
        $users=$ministry->users()->get();

        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','adminUsername'=> "user",'adminPassword'=>"password"]);

        $pdf = $pdf->loadView('home.ministry.user.member-pdf',['users'=>$users,'ministry'=>$ministry]);

        //$pdf = PDF::loadHTML('home.ministry.user.member-pdf',['users'=>$users])->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')


        return $pdf->download($ministry->name);
    }

}
