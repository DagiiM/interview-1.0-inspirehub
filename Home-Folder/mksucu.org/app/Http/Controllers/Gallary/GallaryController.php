<?php

namespace App\Http\Controllers\Gallary;

use App\Models\Gallary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\WebController;
use Throwable;

class GallaryController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,gallary')->only('create','store');
    $this->middleware('can:ability-edit,gallary')->only('edit','update');
    $this->middleware('can:ability-delete,gallary')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallaries=Gallary::all();

        return $this->showAll('home.gallary.index',$gallaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('home.gallary.create');
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
       'subject'=>'required',
       'url'=>'required|max:2048',
     ];

      $this->validate($request,$rules);

      $data = $request->only(['subject','url']);

      $data['url'] = $request->url->store('gallary','');

      $gallary = Gallary::create($data);

      return $this->showMessage('success','Photo Added successfully!',200);
    }
      catch(Throwable $exception){
        if ($exception->errorInfo[1]==1062)
        {
          return $this->showMessage('warning','Similar Gallary Details Already Exists');
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
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
      return $this->showOne('home.gallary.show',$gallary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallary $gallary)
    {
        return $this->showOne('home.gallary.edit',$gallary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
      $rules = [
       'url'=>'max:2048',
     ];

      $this->validate($request,$rules);

      if($request->has('subject'))
      {
        $gallary->subject=$request->subject;
      }

      if($request->hasFile('url'))
      {
        Storage::delete($gallary->url);

        $gallary->url=$request->url->store('gallary','');
      }

      if(!$gallary->isDirty())
      {
        return $this->showMessage('danger','Please specify a different value to update',200);
      }

        $gallary->save();

        return $this->showMessage('success','Photo Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallary $gallary)
    {
      //Storage::delete($gallary->url);

       $gallary->delete();

      return back()->with('success','Photo Scheduled for Deletion!',200);
    }
}
