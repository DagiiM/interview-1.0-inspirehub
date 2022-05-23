<?php

namespace App\Http\Controllers\Darasa;

use App\Http\Controllers\WebController;
use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-create,darasa')->only('create','store');
        $this->middleware('can:ability-restore,darasa')->only('restore');
        $this->middleware('can:ability-delete,darasa')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $darasas = Darasa::all();

        return $this->showAll('home.darasas.index',$darasas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.darasas.create');
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
            'name'=>['required','max:255','unique:darasas'],
            'description' => ['required','string'],
        ];
        
        $this->validate($request,$rules);

        $data = $request->only(['name','description','date']);

        $darasa = Darasa::create($data);

        return $this->showOne('home.darasas.show',$darasa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function show(Darasa $darasa)
    {
        return $this->showOne('home.darasas.show',$darasa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Darasa  $darasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Darasa $darasa)
    {
        return $this->showOne('home.darasas.edit',$darasa);
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
