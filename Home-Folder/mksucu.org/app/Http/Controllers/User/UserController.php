<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Ministry;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('auth')->except('create','mobileChecker','emailChecker','store');
    $this->middleware('can:ability-list,user')->only('index');
    $this->middleware('can:ability-restore,ability')->only('restore');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::latest()->get(['id','firstname','lastname','mobile','reg_number','verified','email','deleted_at'])->values()->unique(['id']);

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
            return back()->with('warning','The User { '.$search_text.' } Does not Exist');
            }
        }
        
        return $this->showAll('home.users.index',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('auth.register');
    }

    /**
     * Retrieves mobile numbers status from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobileChecker()
    {
            try{
              //Get the mobile parameter from URL
                $search_text = $_GET['mobile'];
                  
                if(strlen($search_text)==10)
                {
                    $user = User::where("mobile",$search_text)->pluck('mobile');

                    if(!$user->isEmpty())
                    {
                      return $this->showMessage('danger','Mobile Number Already taken');
                    }
                      return $this->showMessage('success','Mobile Number Available');     
                 }

                 return $this->showMessage('warning','Mobile Number cannot be less than or greater than 10');
             }
             
            catch(Throwable $exception){
              return $this->showMessage('danger',$exception);
            }
    }
    /**
     * Retrieves email status from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailChecker()
    {
      try{
        //Get the email parameter from URL
          $search_text = $_GET['email'];

          $user = User::where("email",$search_text)->pluck('email');

          if(!$user->isEmpty())
          {
            return $this->showMessage('danger','Email Already taken');
          }
            return $this->showMessage('success','Email Available');     
       }
       
      catch(Throwable $exception){
        return $this->showMessage('danger',$exception);
      }
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

      return redirect("dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $user_loggedIn = Auth::user();
      $ministries=$user->ministries;
      $roles=$user->roles;
      $data=$user;
      if($user_loggedIn->id==$user->id)
      {
        $data = $user_loggedIn;

        return view('home.users.show',['data'=>$data,'roles'=>$roles,'ministries'=>$ministries]);
      }
      elseif ($this->middleware('can:ability-edit-user,user'))
       {
        return view('home.users.show',['data'=>$data,'roles'=>$roles,'ministries'=>$ministries]);
      }
      return view('home.users.show',['data'=>$data,'roles'=>$roles,'ministries'=>$ministries]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $user_loggedIn = Auth::user(['id','firstname']);
      $ministry=Ministry::get(['id','name']);
      $role=Role::get(['name']);
      $ministries=$user->ministries()->get(['id','name']);
      $roles=$user->roles()->get(['id','name']);

      if($user_loggedIn->id==$user->id)
      {
        return view('home.users.edit',['user'=>$user,'ministry'=>$ministry,'ministries'=>$ministries,'role'=>$role,'roles'=>$roles]);
      }
      elseif ($this->authorize('ability-edit-user'))
       {
        return view('home.users.edit',['user'=>$user,'ministry'=>$ministry,'ministries'=>$ministries,'role'=>$role,'roles'=>$roles]);
      }
      $user=$user_loggedIn; //Swap The Values

      return redirect('home.users.edit',['user'=>$user,'ministry'=>$ministry,'ministries'=>$ministries,'role'=>$role,'roles'=>$roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
          'mobile'=>'mobile|unique:users,mobile'.$user->id,
          'email'=>'email|unique:users,email'.$user->id,
          'reg_number'=>'reg_number|unique:users,reg_number'.$user->id,
          'password'=>'min:6|confirmed',
        ];

        if($request->has('firstname'))
        {
          $user->firstname=$request->firstname;
        }
        if($request->has('lastname'))
        {
          $user->lastname=$request->lastname;
        }

        if($request->has('mobile'))
        {
          $user->mobile=$request->mobile;
        }

        if($request->has('reg_number'))
        {
          $user->reg_number=$request->reg_number;
        }

        if($request->hasFile('picture'))
        {
          //Check if user has image then delete it
          $picture = strcmp($user->picture,'profile/default_male_image.png')|strcmp($user->picture,'profile/default_female_image.png');

          if(!$picture)
          {
            Storage::delete($user->picture);
          }

          $user->picture = $request->picture->store('profile','');
        }

        if($request->has('country'))
        {
          $user->country=$request->country;
        }

        if($request->has('city'))
        {
          $user->city=$request->city;
        }

        if($request->has('bio'))
        {
          $user->bio=$request->bio;
        }

        if($request->has('address'))
        {
          $user->address=$request->address;
        }

        if($request->has('postal_code'))
        {
          $user->postal_code=$request->postal_code;
        }

      if ($request->has('email')&&($user->email != $request->email))
            {
              $user->verified=User::UNVERIFIED_USER;
              $user->verification_token=User::generateVerificationCode();
              $user->email_verified_at=null;
              $user->email=$request->email;
            }

        if($request->has('password'))
        {
              $user->password=bcrypt($request->password);
        }

        if(!$user->isDirty())
        {
          return back()->with('error','Please specify a different value to update');
        }

        $user->save();

        return back()->with('success','User Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       // Storage::delete($user->picture);
       $name ='administrator';

       $adminList = User::whereHas('roles', function ($query) use($name){
                           $query->where('name', 'like', '%'.$name.'%');
                       })->get()->values()->unique();

            if(! $adminList->doesntContain($user)){
              return back()->with('warning','User has Administrator Role. And can only be deleted after detaching Administrator Role');
            }
            if(($adminList->count() == 1) && (! $adminList->doesntContain($user))){
              return back()->with('warning','The system Must Have Atleast One Super User for Proper Functioning and Delegation of Duties. Please Assign This Role to Someone Before Deactivation of this Account');
             }

            $user->delete();

            return back()->with('success','User Account Scheduled for Deletion. This May take upto 7 days. If you would like to reconsider your Decision Please reach out to our support team before then!');
          
    }
  
    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
       User::withTrashed()->find($id)->restore();

       return back()->with('success','User Account Restored Successfully',200);    
    }
}
