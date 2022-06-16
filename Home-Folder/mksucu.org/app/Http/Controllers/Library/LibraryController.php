<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\WebController;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class LibraryController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,library')->only('create','store');
    $this->middleware('can:ability-edit,library')->only('edit','update');
    $this->middleware('can:ability-delete,library')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraries=Library::latest()->get(['id','name','description'])->values()->unique(['id']);

      //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $libraries = DB::table('libraries')
                      ->Select(['id','name','description'])
                      ->where('Name', 'like', '%'.$search_text.'%')
                      ->orWhere('Description', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($libraries->isEmpty()){
          return back()->with('warning','The Library { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('home.library.index',$libraries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.library.create');
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

     $library = Library::create($data);

     return $this->showMessage('success','Library created successfully!',200);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Library Details Already Exists');
      }
      if ($exception->errorInfo[1]==1406)
      {
        return $this->showMessage('warning','Subject Too Long');
      }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        return $this->showOne('home.library.show',$library);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        return $this->showOne('home.library.edit',$library);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {

      if($request->has('name'))
      {
        $library->name=$request->name;
      }

      if($request->has('description'))
      {
        $library->description=$request->description;
      }

      if(!$library->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update',200);
      }

        $library->save();

        return $this->showMessage('success','Library Updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();

        return back()->with('success','Library Scheduled for Deletion',200);
    }
}
