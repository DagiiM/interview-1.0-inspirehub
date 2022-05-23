<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\WebController;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-list,email')->only('index');
        $this->middleware('can:ability-create,email')->only('create','store');
        $this->middleware('can:ability-restore,email')->only('restore');
        $this->middleware('can:ability-delete,email')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();

        return $this->showAll('home.emails.index',$emails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.emails.create');
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

        ];

        $this->validate($request,$rules);

        $data = $request->only([]);

        $email = Email::create($data);
        
        return $this->showOne('home.emails.show',$email);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return $this->showOne('home.emails.show',$email);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return $this->showOne('home.emails.edit',$email);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        
        return $this->showOne('home.emails.show',$email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete;

        return $this->showOne('home.emails.show',$email);
    }
}
