<?php

namespace App\Http\Controllers\Ministry;

use App\Models\Chat;
use App\Models\Ministry;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MinistryChatController extends WebController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Ministry $ministry)
  {
    $chats=Chat::all();

    //Let's Delete 15 Days Old Chats
    if (!empty($chats)){
        $oldchats=Chat::where('Expiration_date','<',Carbon::now())->forceDelete();
    }
      $user = Auth::user();

      //All User Ministries
      $ministries = $user->ministries;
      //Check For The Ministry in the Collection
      $ministriesx = $ministries->where('id',$ministry->id);

      if($ministriesx->isEmpty())
      {
        return back()->with('error','You are Not a Member of this Ministry.');
      }

      $chats=$ministry->chats;

    // return response()->json($chats, 200);

      return view('home.ministry.chat.index',['chats'=>$chats,'ministries'=>$ministries,'ministry'=>$ministry,'user'=>$user]);
  }

  /**
   * Socket implementation
   * 
   */
  public function chat()
  {

  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request,Ministry $ministry)
  {
      $rules = [
     'input'=>'',
     'attachment'=>'max:8048',
   ];

   $this->validate($request,$rules);

   // get the current time
   $current = Carbon::now();

   $data = $request->all();

   $data['Expiration_date'] = $current->addDays(7); //Set 7 days Expiry Period

   if ($request->input!==null)
    {
      $data['message']=$request->input;
   }

   $user=Auth::user();

   $data['sender_id']=$user->id;

   $data['ministry_id']=$ministry->id;

    if ($request->attachment!==null)
    {
       $data['attachment'] = $request->attachment->store('attachments','');
    }

   $chat = Chat::create($data);

   return back()->with('success','Success');
  }

  public function destroy(Ministry $ministry,Chat $chat)
  {
    if ($chat->attachment!=null)
    {
      Storage::delete($chat->attachment);
    }
    $chat->forceDelete();

    return back()->with('success','Chat Deleted Successfully!');
  }


}
