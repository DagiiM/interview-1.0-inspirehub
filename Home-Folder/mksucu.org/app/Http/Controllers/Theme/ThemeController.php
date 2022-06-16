<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\WebController;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ThemeController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,theme')->only('create','store');
    $this->middleware('can:ability-edit,theme')->only('edit','update');
    $this->middleware('can:ability-delete,theme')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes=Theme::latest()->get(['id','semester','subject'])->unique(['id']);

         //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $themes = DB::table('themes')
                      ->Select(['id','semester','subject'])
                      ->where('semester', 'like', '%'.$search_text.'%')
                      ->orWhere('subject', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($themes->isEmpty()){
          return back()->with('warning','The Theme { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('system.theme.index',$themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('system.theme.create');
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
       'semester'=>'required',
       'subject'=>'required',
     ];

     $this->validate($request,$rules);

     $data = $request->all();

     $theme = Theme::create($data);

    return $this->showMessage('success','Theme created successfully!',200);
      }
      catch(Throwable $exception){
        if ($exception->errorInfo[1]==1062)
        {
          return $this->showMessage('warning','Similar Theme Details Already Exists');
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
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return $this->showOne('system.theme.show',$theme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
          return $this->showOne('system.theme.edit',$theme);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
      if($request->has('semester'))
      {
        $theme->semester=$request->semester;
      }

      if($request->has('subject'))
      {
        $theme->subject=$request->subject;
      }

      if(!$theme->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update');
      }

      $theme->save();

        return $this->showMessage('success','Theme Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
      $theme->delete();

      return back()->with('success','Theme Scheduled for Deletion!',200);
    }
}
