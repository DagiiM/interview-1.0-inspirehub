<?php

namespace App\Http\Controllers;

use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $darasa = Darasa::all();

        return view('home.darasa.index');
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
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function show(Darasa $darasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Darasa $darasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Darasa $darasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Darasa $darasa)
    {
        //
    }
}
