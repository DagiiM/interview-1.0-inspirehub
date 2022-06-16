<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\WebController;
use App\Models\Role;
use App\Models\Ability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class RoleController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,role')->only('create','store');
    $this->middleware('can:ability-edit,role')->only('edit','update');
    $this->middleware('can:ability-delete,role')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::with('abilities')->get(['id','name','description','priority','created_at','deleted_at'])->values()->unique(['id']);

         //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $roles = DB::table('roles')
                      ->Select(['id','name','description','priority','created_at','deleted_at'])
                      ->where('Name', 'like', '%'.$search_text.'%')
                      ->orWhere('Description', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($roles->isEmpty()){
          return back()->with('warning','The Role { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('home.role.index',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ability=Ability::all();

      return $this->showAll('home.role.create',$ability);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
      $rules = [
       'name'=>'required',
       'description'=>'required',
     ];

       $this->validate($request,$rules);

        $ability = $request->input('ability_select');

        $data=$request->only(['name','description','ability_select']);

        $role=Role::create($data);

        $ability=$role->allowTo($ability);

        return $this->showMessage('success','Role created successfully!',200);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Role Details Already Exists');
      }
      if ($exception->errorInfo[1]==1406)
      {
        return $this->showMessage('warning','Description Too Long');
      }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $abilities=$role->abilities;

        return $this->showAll('home.role.show',$abilities,$role,);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return $this->showOne('home.role.edit',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      if($role->priority === Role::PRIORITY_HIGH)
      {
        return $this->showMessage('warning','This Role is Core to the System Proper Functioning and therefore Cannot be Updated!');
      }

      if($request->has('name'))
      {
        $role->name=$request->name;
      }

      if($request->has('description'))
      {
        $role->description=$request->description;
      }

      if(!$role->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update',200);
      }

      $role->save();

        return $this->showMessage('success','Role Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->priority === Role::PRIORITY_HIGH)
        {
         return back()->with('warning','This Role is Core to the System and Cannot be Deleted!',403);
        }

      $role->delete();

      return back()->with('success','Role Scheduled for Deletion!',200);
    }
}
