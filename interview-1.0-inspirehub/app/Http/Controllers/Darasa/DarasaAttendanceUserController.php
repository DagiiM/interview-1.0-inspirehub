<?php

namespace App\Http\Controllers\Darasa;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaAttendanceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Darasa $darasa,Attendance $attendance)
    {
        $students = $darasa->users()->get()->unique()->values();

        return view('home.darasas.attendances.students.index',['darasa'=>$darasa,'attendance'=>$attendance,'students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Darasa $darasa,Attendance $attendance)
    {
        $students = $darasa->users()->get()->unique()->values();

        $studentsx = $attendance->users()->get()->unique()->values();

        $students = $students->diff($studentsx);

        return view('home.darasas.attendances.students.create',['darasa'=>$darasa,'attendance'=>$attendance,'students'=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Darasa $darasa,Attendance $attendance)
    {
        $rules = [
            'present'=>['required'],
        ];

        $this->validate($request,$rules);

        $data = $request->only(['present']);

        $attendance->assignUser($data['present']);

        $students = $attendance->users()->get()->unique()->values();

        return view('home.darasas.attendances.students.index',['darasa'=>$darasa,'attendance'=>$attendance,'students'=>$students]);       
    }
}
