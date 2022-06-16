<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,event')->only('create','store');
    $this->middleware('can:ability-edit,event')->only('edit','update');
    $this->middleware('can:ability-delete,event')->only('destroy');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::latest()->get(['id','subject','description','url','created_at']);

        if (request()->has('search') != '')
        {
        $search_text = $_GET['search'];
  
        $events = DB::table('events')
                        ->Select(['id','subject','description','url','created_at'])
                        ->where('subject', 'like', '%'.$search_text.'%')
                        ->orWhere('description', 'like', '%'.$search_text.'%')
                        ->orWhere('url', 'like', '%'.$search_text.'%')
                        ->orderBy('ID', 'desc')
                        ->distinct()
                        ->get();
  
        if($events->isEmpty()){
            return back()->with('warning','The Event { '.$search_text.' } Does not Exist');
            }
        }
        return $this->showAll('home.event.index',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.event.create');
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
          'description'=>'required',
          'url'=>'required',
        ];
   
         $this->validate($request,$rules);
   
         $data = $request->all();
   
         $data['url'] = $request->url->store('event','');
   
         $event = Event::create($data);
   
         return $this->showMessage('success','Event created successfully!',200);
      }

      catch(Throwable $exception){
        if ($exception->errorInfo[1]==1062)
        {
          return $this->showMessage('warning','Similar Event Details Already Exists');
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
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $this->showOne('home.event.show',$event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return $this->showOne('home.event.edit',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $rules = [
       'url'=>'max:5048',
     ];

      $this->validate($request,$rules);

      $data = $request->all();

      if($request->has('subject'))
      {
        $event->subject=$request->subject;
      }

      if($request->has('description'))
      {
        $event->description=$request->description;
      }

      if($request->hasFile('url'))
      {
        Storage::delete($event->url);

        $event->url=$request->url->store('event','');
      }

      if(!$event->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update');
      }

      $event->save();

      return $this->showMessage('success','Event Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
     // Storage::delete($event->url);

      $event->delete();

      return back()->with('success','Event Scheduled for Deletion!',200);
    }
}
