<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Email;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mail,$user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail=$this->mail;
        $users = User::all();
        $users = $users->where('email_verified_at',0);

        $user = $users->where($mail)->pluck('firstname')->values()->unique();

        $current = Carbon::now();
        $morning = Carbon::today()->startOfDay();
        $afternoon = $morning->addHours(12);
        $evening   = $afternoon->addHours(6);

        if ($current < $afternoon)
        {
          $greeting = "Good morning";
        }

        else if ( $current > $morning && $current < $evening)
        {
          $greeting = "Good Afternoon";
        }

        else if ($current > $morning && $current > $afternoon)
         {
          $greeting =  "Good Evening";
        }

        return $this->markdown('emails.reminder-verify',['mail'=>$mail,'greeting'=>$greeting,'user'=>$user]);
    }
}
