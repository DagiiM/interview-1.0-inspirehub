<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\WebController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
        $this->middleware('can:ability-list,user')->only('index');
        $this->middleware('can:ability-create-user,user')->only('create','store');
        $this->middleware('can:ability-restore,user')->only('restore');
        $this->middleware('can:ability-delete,user')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->showAll('home.users.index',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne('home.users.show',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $this->showOne('home.users.edit',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showOne('home.users.show',$user);
    }

          /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(User $user)
    {
       $user = User::withTrashed()->restore();

       return $this->showOne('home.users.show',$user);    
    }
}
