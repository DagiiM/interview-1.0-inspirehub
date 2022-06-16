<?php

namespace App\Http\Controllers\Ebook;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Storage;
use App\Models\Ebook;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class EbookController extends WebController
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('can:ability-create,ebook')->only('create','store');
    $this->middleware('can:ability-edit,ebook')->only('edit','update');
    $this->middleware('can:ability-delete,ebook')->only('destroy');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks=Ebook::latest()->get(['id','library_id','subject','url','deleted_at'])->values()->unique(['id']);

             //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $ebooks = DB::table('ebooks')
                      ->Select(['id','library_id','subject','url','deleted_at'])
                      ->where('library_id', 'like', '%'.$search_text.'%')
                      ->orWhere('subject', 'like', '%'.$search_text.'%')
                      ->orWhere('url', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($ebooks->isEmpty()){
          return back()->with('warning','The Ebook { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('home.ebook.index',$ebooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libraries = Library::all();

        return $this->showAll('home.ebook.create',$libraries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Library $library)
    {
      try{

        $rules = [
          'subject'=>'required',
          'url'=>'required|mimes:pdf,xlx,csv|max:5048',
        ];
   
         $this->validate($request,$rules);
   
         $data = $request->only(['subject','url']);
   
         if (is_string($request->library))
          {
           $library=Library::whereName($request->library)->firstOrFail();
         }
   
         $data['library_id']=$library->id;
   
         $data['url'] = $request->url->store('ebook','');
   
         $ebook = Ebook::create($data);
   
         //$ebook->assignLibrary($request->library);
   
         return $this->showMessage('success','Ebook Uploaded Successfully!',200);
      }
      catch(Throwable $exception){
        if ($exception->errorInfo[1]==1062)
        {
          return $this->showMessage('warning','Similar Ebook Details Already Exists');
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
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show(Ebook $ebook)
    {
        return $this->showOne('home.ebook.show',$ebook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebook $ebook)
    {
        return $this->showOne('home.ebook.edit',$ebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ebook $ebook)
    {
      $rules = [
      // 'url'=>'mimes:pdf,xlx,csv|max:5048',
     ];

      $this->validate($request,$rules);

      $data = $request->all();

      if($request->has('subject'))
      {
        $ebook->subject=$request->subject;
      }

      if($request->has('url'))
      {
        Storage::delete($ebook->url);

        $ebook->url=$request->url->storeAs('ebook',$data['subject']);
      }

      if(!$ebook->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update');
      }

      $ebook->save();

      return $this->showMessage('success','Ebook Updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
       // Storage::delete($ebook->url);

        $ebook->delete();

        return back()->with('success','Ebook Scheduled for Deletion!',200);
    }
}
