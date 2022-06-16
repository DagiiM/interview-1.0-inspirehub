<?php

namespace App\Http\Controllers\Ability;

use App\Models\Ability;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class AbilityController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-list,ability')->only('index','show');
    $this->middleware('can:ability-create,ability')->only('create','store');
    $this->middleware('can:ability-edit,ability')->only('edit','update');
    $this->middleware('can:ability-delete,ability')->only('destroy');
    $this->middleware('can:ability-restore,ability')->only('restore');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $abilities=Ability::latest()->get(['id','name','description','priority','deleted_at'])->values()->unique(['id']);

      //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $abilities = DB::table('abilities')
                      ->Select(['id','name','description','priority','deleted_at'])
                      ->where('Name', 'like', '%'.$search_text.'%')
                      ->orWhere('Description', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($abilities->isEmpty()){
          return back()->with('warning','The Ability { '.$search_text.' } Does not Exist');
          }
      }

      return $this->showAll('home.ability.index',$abilities);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('home.ability.create');
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
   
      $data = $request->all();
   
      $ability = Ability::create($data);
   
      return $this->showMessage('success','Ability created successfully!');
    } 
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Permission Already Exists');
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
   * @param  \App\Models\Ability  $ability
   * @return \Illuminate\Http\Response
   */
  public function show(Ability $ability)
  {
    return $this->showOne('home.ability.show',$ability);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ability  $ability
   * @return \Illuminate\Http\Response
   */
  public function edit(Ability $ability)
  {
    return $this->showOne('home.ability.edit',$ability);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ability  $ability
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ability $ability)
  {
    if($ability->priority === Ability::PRIORITY_HIGH)
    {
      return $this->showMessage('warning','This Ability is Core to the System Proper Functioning and therefore Cannot be Updated!');
    }

    if($request->has('name'))
    {
      $ability->name=$request->name;
    }

    if($request->has('description'))
    {
      $ability->description=$request->description;
    }

    if(!$ability->isDirty())
    {
      return $this->showMessage('warning','Please specify a different value to update');
    }

    $ability->save();

    return $this->showMessage('success','Ability Updated successfully!',200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ability  $ability
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ability $ability)
  {
      if($ability->priority === Ability::PRIORITY_HIGH)
      {
        return back()->with('warning','This Ability is Core to the System Proper Functioning and therefore Cannot be Deleted!',403);
      }

      $ability->delete();

      return back()->with('success','Ability Scheduled for Deletion!',200);
  }

      /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
       Ability::withTrashed()->find($id)->restore();

       return back()->with('success','Ability Restored Successfully',200);    
    }
}
