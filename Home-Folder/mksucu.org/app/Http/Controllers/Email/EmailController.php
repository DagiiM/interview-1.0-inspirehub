<?php

namespace App\Http\Controllers\Email;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Email;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeMail;
use App\Mail\ReminderMail;

class EmailController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-list,email')->only('index');
    $this->middleware('can:ability-create,email')->only('create','store');
    $this->middleware('can:ability-delete,email')->only('destroy');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $email=Email::all();
        //Let's Delete 7 Days Old Mails
      if (!empty($email)){
        $oldmails=Email::where('Expiration_date','<',Carbon::now())->forceDelete();
      }

      return $this->showAll('home.email.index',$email);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $unverified = $users->where('email_verified_at',0);
        $users=$users->diff($unverified);
        $emails = $users->pluck('email')->values()->unique();

        return view('home.email.create',['emails'=>$emails]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $ministry
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return new ComposeMail($email);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'subject'=>'required',
          'message'=>'required',
          'url'=>'required|max:2048',
          'email'=>'required',
        ];

        $this->validate($request,$rules);
        
        //Emails
        $emails = $request->input('email');
        // get the current time
        $current = Carbon::now();

        $data = $request->only(['subject','message','url','email']);

        $data['url'] = $request->url->store('email_image','');

      //  $users = User::all();

      //  $users = $users->where('verified',0);

      //  $emails = $users->pluck('email')->values()->unique();

        $data['sender_email'] = config('mail.from.address');

        $data['Expiration_date'] = $current->addHours(1);
        
        foreach ($emails as $email)
         {
          $data['receiver_email'] = $email;

          $mail=Email::create($data);

          Mail::to($email)->send(new ComposeMail($mail));
        }

        return back()->with('success','Emails Queued successfully!',200);

    }

    /**
     * reminder mail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reminder(Email $email)
    {
      $users = User::all();
      $users = $users->where('email_verified_at',0)->pluck('email')->values()->unique();

      foreach ($users as $email)
       {
        Mail::to($email)->later(now()->addMinutes(1),new ReminderMail($email));
      }
        return back()->with('success', 'Verification links sent!',200);

    }


}
