<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\WebController;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ServiceController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,service')->only('create','store');
    $this->middleware('can:ability-edit,service')->only('edit','update');
    $this->middleware('can:ability-delete,service')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services = Service::latest()->get(['id','subject','time'])->unique(['id']);

              //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $services = DB::table('services')
                      ->Select(['id','subject','time'])
                      ->where('subject', 'like', '%'.$search_text.'%')
                      ->orWhere('time', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($services->isEmpty()){
          return back()->with('warning','The Service { '.$search_text.' } Does not Exist');
          }
      }


        return $this->showAll('system.service.index',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.service.create');
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
       'time'=>'required',
     ];

     $this->validate($request,$rules);

     $data = $request->all();

     $service = Service::create($data);

     return $this->showMessage('success','Service Added successfully!',200);
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Service Details Already Exists');
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return $this->showOne('system.service.show',$service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return $this->showOne('system.service.edit',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
      if($request->has('subject'))
      {
        $service->subject=$request->subject;
      }

      if($request->has('time'))
      {
        $service->time=$request->time;
      }

      if(!$service->isDirty())
      {
        return $this->showMessage('danger','Please specify a different value to update');
      }

      $service->save();

      return $this->showMessage('success','Service Details Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
      $service->delete();

      return back()->with('success','Service Scheduled for Deletion!');
    }
}
