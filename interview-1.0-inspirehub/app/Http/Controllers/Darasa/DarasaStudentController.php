<?php

namespace App\Http\Controllers\Darasa;

use App\Http\Controllers\WebController;
use App\Models\Student;
use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaStudentController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-list,user')->only('index');
        $this->middleware('can:ability-create,user')->only('create','store');
        $this->middleware('can:ability-restore,ability')->only('restore');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Darasa $darasa)
    {
        $students = $darasa->users()->get()->unique()->values();

        return $this->showAll('home.darasas.students.index',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
