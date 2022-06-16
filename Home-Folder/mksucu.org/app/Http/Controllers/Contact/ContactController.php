<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\WebController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ContactController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-list,contact')->only('index','show');
    $this->middleware('can:ability-create,contact')->only('create','store');
    $this->middleware('can:ability-edit,contact')->only('edit','update');
    $this->middleware('can:ability-delete,contact')->only('destroy');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::latest()->get(['id','name','mobile'])->values()->unique(['id']);

             //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $contacts = DB::table('contacts')
                      ->Select(['id','name','mobile'])
                      ->where('Name', 'like', '%'.$search_text.'%')
                      ->orWhere('Mobile', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($contacts->isEmpty()){
          return back()->with('warning','The Contact { '.$search_text.' } Does not Exist');
          }
      }

       return $this->showAll('system.contact.index',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.contact.create');
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
          'name'=>'required',
          'mobile'=>'required|min:10|max:13',
        ];
   
        $this->validate($request,$rules);
   
        $data = $request->only(['name','mobile']);
   
        $contact = Contact::create($data);
   
        return $this->showMessage('success','Contact created successfully!',201);
      }
      catch(Throwable $exception){
        if ($exception->errorInfo[1]==1062)
        {
          return $this->showMessage('warning','Similar Contact Details Already Exists');
        }
        if ($exception->errorInfo[1]==1406)
        {
          return $this->showMessage('warning','Description Too Long');
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return $this->showOne('system.contact.show',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return $this->showOne('system.contact.edit',$contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
      $rules = [
       'mobile'=>'min:10|max:13',
     ];

      if($request->has('name'))
      {
        $contact->name=$request->name;
      }

      if($request->has('mobile'))
      {
        $contact->mobile=$request->mobile;
      }

      if(!$contact->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update');
      }

      $contact->save();

      return $this->showMessage('success','Contact Updated successfully!',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
      $contact->delete();

      return back()->with('success','Contact Deleted successfully!',200);
    }
}
