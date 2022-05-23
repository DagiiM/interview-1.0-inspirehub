<?php

namespace App\Http\Controllers\Ability;

use App\Http\Controllers\WebController;
use App\Models\Ability;
use Illuminate\Http\Request;

class AbilityController extends WebController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:ability-list,ability')->only('index');
        $this->middleware('can:ability-create,ability')->only('create','store');
        $this->middleware('can:ability-restore,ability')->only('restore');
        $this->middleware('can:ability-delete,ability')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abilities = Ability::all();

        return $this->showAll('home.abilities.index',$abilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.abilities.create');
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
            'name'=>['required','max:255','unique:abilities'],
            'description' => ['required','string','unique:abilities'],
        ];
        
        $this->validate($request,$rules);

        $data = $request->only(['name','description']);

        $ability = Ability::create($data);

        return $this->showOne('home.abilities.show',$ability);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        return $this->showOne('home.abilities.show',$ability);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function edit(Ability $ability)
    {
        return $this->showOne('home.abilities.edit',$ability);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ability $ability)
    {
        return $this->showOne('home.abilities.show',$ability);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
        if($ability->priority == 'Core'){
            return back()->with('error','This is a Critical Permission And Cannot be Deleted');
        }

        $ability->delete();

        return $this->showOne('home.abilities.show',$ability);
    }
}
