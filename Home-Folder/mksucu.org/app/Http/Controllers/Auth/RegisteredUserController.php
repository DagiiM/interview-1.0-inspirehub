<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
      $rules = [
       'firstname'=>'required',
       'lastname'=>'required',
       'bio'=>'required',
       'mobile' => 'required|string|min:8|max:12|unique:users',
       'email'=>'required|email|unique:users',
       'password'=>'required|min:6|confirmed',
       'gender'=>'required',
     ];

      $man = "Male";
      $woman = "Female";

      $this->validate($request,$rules);

      $data = $request->all();
      $data['password'] = bcrypt($request->password);
      $data['verified'] = User::UNVERIFIED_USER;

      if (strcmp($request->gender, $woman))
       {
        $picture='profile/default_male_image.png';
      }

      elseif (strcmp($request->gender, $man))
      {
        $picture='profile/default_female_image.png';
      }

      $data['picture']=$picture;

      $data['cover_image'] ='profile/default_cover_image.jpg';

      $data['verification_token'] = User::generateVerificationCode();

      $user = User::create($data);

      event(new Registered($user));

      Auth::login($user);

      return redirect(RouteServiceProvider::HOME);
    }
}
