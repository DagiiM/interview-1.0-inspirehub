<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\Library;
use Illuminate\Support\Facades\DB;

class LibraryEbookController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Library $library)
    {
      $ebooks=$library->ebooks()
                      ->get()
                      ->unique()
                      ->values();
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
             return $this->showMessage('warning','The Ebook { '.$search_text.' } Does not Exist');
             }
         }
   
      

      return $this->showAll('home.library.ebook.index',$ebooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Library $library)
    {
        return $this->showOne('home.library.ebook.create',$library);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Library $library)
    {
      $rules = [
       'subject'=>'required',
       'url'=>'required|mimes:pdf,xlx,csv|max:5048',
     ];

      $this->validate($request,$rules);

      $data = $request->only(['subject','url']);

      $data['library_id']=$library->id;

      $data['url'] = $request->url->store('ebook','');

      $ebook = Ebook::create($data);

      return $this->showMessage('success','Ebook Added to the Library successfully!',200);
    }

}
