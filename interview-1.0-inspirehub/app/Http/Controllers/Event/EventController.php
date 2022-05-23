<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\WebController;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-create,event')->only('create','store');
        $this->middleware('can:ability-restore,event')->only('restore');
        $this->middleware('can:ability-delete,event')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return $this->showAll('home.events.index',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name'=>['required','string','max:255','unique:events'],
            'description' => ['required','string','unique:events'],
            'date' => ['required','after:today'],
        ];

        $this->validate($request,$rules);

        $data = $request->only(['name','description','date']);

        $event = Event::create($data);

        return $this->showOne('home.events.show',$event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $this->showOne('home.events.show',$event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return $this->showOne('home.events.edit',$event);
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
        return $this->showOne('home.events.show',$event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return $this->showOne('home.events.show',$event);
    }
}
