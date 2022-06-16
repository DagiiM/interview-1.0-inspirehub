<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\WebController;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SocialController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,social')->only('create','store');
    $this->middleware('can:ability-edit,social')->only('edit','update');
    $this->middleware('can:ability-delete,social')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials=Social::latest()->get(['id','name','url'])->unique(['id']);

         //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $socials = DB::table('socials')
                      ->Select(['id','name','url'])
                      ->where('Name', 'like', '%'.$search_text.'%')
                      ->orWhere('url', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($socials->isEmpty()){
          return back()->with('warning','The Social Network { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('system.social.index',$socials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.social.create');
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
       'url'=>'required',
     ];

     $this->validate($request,$rules);

     $data = $request->all();

     $social = Social::create($data);

     return $this->showMessage('success','Social Link created successfully!',200);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Social Network Details Already Exists');
      }
      if ($exception->errorInfo[1]==1406)
      {
        return $this->showMessage('warning','Name Too Long');
      }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        return $this->showOne('system.social.show',$social);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        return $this->showOne('system.social.edit',$social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
      if($request->has('name'))
      {
        $social->name=$request->name;
      }

      if($request->has('url'))
      {
        $social->url=$request->url;
      }

      if(!$social->isDirty())
      {
        return $this->showMessage('danger','Please specify a different value to update');
      }

      $social->save();

        return $this->showMessage('success','Social Link Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
      $social->delete();

      return back()->with('success','Social Link Scheduled for Deletion!');
    }
}
