<?php

namespace App\Http\Controllers\Darasa;

use App\Http\Controllers\WebController;
use App\Models\Attendance;
use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaAttendanceController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Darasa $darasa)
    {
        $attendances = $darasa->attendances()->get();
       
        return view('home.darasas.attendances.index',['attendances'=>$attendances,'darasa'=>$darasa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Darasa $darasa)
    {
        return $this->showOne('home.darasas.attendances.create',$darasa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Darasa $darasa)
    {
        $rules = [
            'name'=>['required','unique:attendances','max:50'],
            'description'=>['required','unique:attendances','max:255'],
        ];

        $this->validate($request,$rules);

        $data = $request->only(['name','description']);

        $attendance = Attendance::create($data);

        $darasa->assignAttendance($attendance);

        return view('home.darasas.attendances.show',['darasa'=>$darasa,'attendance'=>$attendance]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Darasa $darasa,Attendance $attendance)
    {
        return view('home.darasas.attendances.show',['darasa'=>$darasa,'attendance'=>$attendance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return back()->with('success','Deleted Successfully');
    }
}
