<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\WebController;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Throwable;

class ImageController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,image')->only('create','store');
    $this->middleware('can:ability-edit,image')->only('edit','update');
    $this->middleware('can:ability-delete,image')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $images=Image::all();

        return $this->showAll('system.image.index',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('system.image.create');
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
       'image'=>'required|max:2048',
     ];

      $this->validate($request,$rules);

      $data = $request->all();

      $data['image'] = $request->image->store('system_image','');

      $image = Image::create($data);

      return $this->showMessage('success','Image Added successfully!',200);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Photo Details Already Exists');
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
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return $this->showOne('system.image.show',$image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return $this->showOne('system.image.edit',$image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
      $rules = [
       'image'=>'max:2048',
     ];

      $this->validate($request,$rules);

      if($request->has('subject'))
      {
        $image->subject=$request->subject;
      }

      if($request->hasFile('image'))
      {
        Storage::delete($image->image);

        $image->image=$request->image->store('system_image','');
      }

      if(!$image->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update',200);
      }

        $image->save();

        return $this->showMessage('success','Image Details Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
      $image->delete();

     // Storage::delete($image->image);

      return back()->with('success','Photo Secheduled for Deletion!',200);
    }
}
