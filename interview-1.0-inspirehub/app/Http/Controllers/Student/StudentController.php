<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\WebController;
use App\Models\Darasa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-list,student')->only('index');
        $this->middleware('can:ability-create,student')->only('create','store');
        $this->middleware('can:ability-restore,student')->only('restore');
        $this->middleware('can:ability-delete,student')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('designation','student')->get()->values();

        return  $this->showAll('home.students.index',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $darasa = Darasa :: all()->pluck('name')->unique()->values();

        return view('home.students.create',['darasa'=>$darasa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'registration_number' => ['required','string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'darasa' => ['required'],
        ];

        $this->validate($request,$rules);

        $data = $request->only(['firstname','lastname','email','registration_number','password','password_confirmation','darasa']);

        $data['designation'] = 'student';

        $data['password'] =  Hash::make($request->registration_number);

        $user = User::create($data);

        $user->assignDarasa($data['darasa']);

        return $this->showOne('home.users.show',$user);
    }

}
