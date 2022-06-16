<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\WebController;
use App\Models\User;
use App\Models\Video;
use App\Models\Ministry;
use App\Jobs\UploadedVideo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class VideoController extends WebController
{

  public function __construct()
  {
    parent::__construct();
    $this->middleware('auth')->except('index','show');
    $this->middleware('can:ability-create,video')->only('create','store');
    $this->middleware('can:ability-edit,video')->only('edit','update');
    $this->middleware('can:ability-delete,video')->only('destroy');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ministry $ministry,User $user)
    {
      $videos = Video::with('ministry')->latest()->get(['id','subject','poster','url','description','ministry_id'])->values()->unique(['id']);
              
         //Where a search is Performed
      if (request()->has('search') != '')
      {
      $search_text = $_GET['search'];

      $videos = DB::table('videos')
                      ->Select(['id','subject','poster','url','description','ministry_id'])
                      ->where('subject', 'like', '%'.$search_text.'%')
                      ->orWhere('description', 'like', '%'.$search_text.'%')
                      ->orWhere('url', 'like', '%'.$search_text.'%')
                      ->orderBy('ID', 'desc')
                      ->distinct()
                      ->get();

      if($videos->isEmpty()){
          return $this->showMessage('warning','The Video { '.$search_text.' } Does not Exist');
          }
      }

        return $this->showAll('home.video.index',$videos,$ministry,$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();

      //All User Ministries
      $ministries = $user->ministries()->get()->values()->unique();

      return view('home.video.create',['ministries'=>$ministries,'user'=>$user]);
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
       'subject'=>'required',
       'description'=>'required',
      // 'poster'=>'required|max:2048|dimensions:min_width=630,min_height=1200',
       'poster'=>'required|max:2048',
       'url'=>'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:200040',
     ];

      $this->validate($request,$rules);

      $user = Auth::user();

      $data = $request->all();

      $ministry = $request->input('ministry');

      $data['ministry_id']=1;

      //All User Ministries
      $ministries = $user->ministries()->get()->values()->unique();
      //Check For The Ministry in the Collection
      $ministriesx = $ministries->where('name',$ministry);

      if($ministriesx->isEmpty())
      {
        return $this->showMessage('danger','You are Not a Member of this Ministry.');
      }

      $data['poster'] = $request->poster->store('poster','');

      $data['url'] = $request->url->store('video','');

      dispatch(new UploadedVideo($data,$ministry));

      return $this->showMessage('success','Video Upload in Progress!');
    }
    catch(Throwable $exception){
      if ($exception->errorInfo[1]==1062)
      {
        return $this->showMessage('warning','Similar Video Details Already Exists');
      }
      if ($exception->errorInfo[1]==1406)
      {
        return $this->showMessage('warning','Subject or Description Too Long');
      }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
       $videos=Video::with('ministry')->get()->values()->unique();

       $user = Auth::user();

        return $this->showAll('home.video.show',$videos,$video,$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return $this->showOne('home.video.edit',$video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
      $rules = [
        'poster'=>'max:2048',
         'url'=>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:200040',
      ];

      $this->validate($request,$rules);

       if($request->has('subject'))
      {
        $video->subject=$request->subject;
      }
      if($request->has('description'))
     {
       $video->description=$request->description;
     }

      if($request->hasFile('poster'))
      {
        Storage::delete($video->poster);

        $video->poster=$request->poster->store('poster','');
      }

      if($request->hasFile('url'))
      {
        Storage::delete($video->url);

        $video->url=$request->url->store('video','');
      }

      if(!$video->isDirty())
      {
        return $this->showMessage('warning','Please specify a different value to update');
      }

      $video->save();

        return $this->showMessage('success','Video Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
      $video->delete();

      //Storage::delete($video->url);

      return $this->showMessage('success','Video Scheduled for Deletion!');
    }
}
