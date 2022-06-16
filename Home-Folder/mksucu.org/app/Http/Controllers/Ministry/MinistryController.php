<?php

namespace App\Http\Controllers\Ministry;

use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\DB;
use Throwable;

class MinistryController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,ministry')->only('create','store');
    $this->middleware('can:ability-delete,ministry')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ministries = Ministry::latest()->get(['id','name','description','image','created_at'])->values()->unique(['id']);

        //Where a search is Performed
        if (request()->has('search') != '')
         {
         $search_text = $_GET['search'];
   
         $ministries = DB::table('ministries')
                         ->Select(['id','name','description','image','created_at'])
                         ->where('name', 'like', '%'.$search_text.'%')
                         ->orWhere('description', 'like', '%'.$search_text.'%')
                         ->orWhere('image', 'like', '%'.$search_text.'%')
                         ->orderBy('ID', 'desc')
                         ->distinct()
                         ->get();
   
         if($ministries->isEmpty()){
             return back()->with('warning','The Ministry { '.$search_text.' } Does not Exist');
             }
         }
   
      return $this->showAll('home.ministry.index',$ministries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.ministry.create');
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
       'image'=>'required|max:2048',
     ];

     $this->validate($request,$rules);

     $data = $request->all();

     $data['image'] = $request->image->store('ministry_image','');

     $ministry = Ministry::create($data);

     return $this->showMessage('success','Ministry created successfully!',201);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Ministry Details Already Exists');
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
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function show(Ministry $ministry)
    {
        return $this->showOne('home.ministry.show',$ministry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function edit(Ministry $ministry)
    {
        return $this->showOne('home.ministry.edit',$ministry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ministry $ministry)
    {
      $rules = [
       'image'=>'max:2048',
     ];

      $this->validate($request,$rules);

      if($request->has('name'))
      {
        $ministry->name=$request->name;
      }

      if($request->has('description'))
      {
        $ministry->description=$request->description;
      }

      if($request->hasFile('image'))
      {
        Storage::delete($ministry->image);

        $ministry->image=$request->image->store('ministry_image','');
      }

      if(!$ministry->isDirty())
      {
        return $this->showMessage('danger','Please specify a different value to update');
      }

      $ministry->save();

      return $this->showMessage('success','Ministry Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ministry $ministry)
    {
      $ministry->delete();

     // Storage::delete($ministry->image);

      return back()->with('success','Ministry Scheduled for Deletion');
    }
}
