<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ministry;

class UserMinistryController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $ministries=$user->ministries;

        return $this->showAll('home.users.ministry.index',$ministries,$user,$user);//collection, optional model, user model
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {   //All Ministries
        $collection = Ministry::all();
        //Users Current Ministries
        $ministry=$user->ministries;
        //Ministries for the User To Join in
        $ministries=$collection->diff($ministry);

        return $this->showAll('home.users.ministry.create',$ministries,$user,$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        $rules=[
          'ministry'=>'required',
        ];

        $this->validate($request,$rules);

        $data = $request->all();

        $user->assignMinistry($data['ministry']);

        $user->save();

        return back()->with('success','Updated Ministry Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Ministry $ministry)
    {
        $user->ministries()->detach($ministry);

        return back()->with('success','You have been successfully Signed out from The Ministry. We are Sad to see you Leave');

    }
}
