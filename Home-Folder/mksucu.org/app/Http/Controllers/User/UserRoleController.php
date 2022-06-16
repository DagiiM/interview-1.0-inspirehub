<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends WebController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(User $user)
  {
      $roles=$user->roles;

      return $this->showAll('home.users.role.index',$roles,$user,$user);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
      $this->authorize('ability-create',$user);

       if(Auth::user() === $user){
         return back()->with('warning','You Cannot Assign Yourself Roles');
      }

      //All roles
       $collection = Role::all();
       //Users Current roles
       $role=$user->roles;
       //roles to be attached to the user
       $roles=$collection->diff($role);

      return $this->showAll('home.users.role.create',$roles,$user,$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
       $this->authorize('ability-create',$user);

      $rules=[
        'role'=>'required',
      ];

      $this->validate($request,$rules);

      $data = $request->all();

      $user->assignRole($data['role']);

      $user->save();

      return back()->with('success','Updated Role Sucessfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Role $role)
    {
      $roleName = 'administrator';
    
      if($role->name === $roleName){
          $adminList = User::whereHas('roles', function ($query) use($roleName){
            $query->where('name', 'like', '%'.$roleName.'%');
        })->get()->values()->unique();

        if(($adminList->count() == 1) && (! $adminList->doesntContain($user))){
          return back()->with('warning','The system must have atleast one Super User for proper functioning and delegation of duties. Please Assign This Role to someone before detaching it from the Account');
        }
      }
      
     $user->roles()->detach($role);

      return back()->with('success','Role Detached Successfully');
    }
}
