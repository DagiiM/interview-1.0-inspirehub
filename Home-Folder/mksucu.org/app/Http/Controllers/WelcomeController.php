<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\Contact;
use App\Models\Social;
use App\Models\Theme;
use App\Models\Image;
use App\Models\Service;
use App\Models\Event;
use App\Models\User;
use App\Models\Ministry;
use App\Models\Library;

class WelcomeController extends Controller
{
  public function index()
  {
    $system = System::first();//->get(['id','application_name','email','vision','mission','values','description'])->values()->unique(['id'])->take(1);

    return view('welcome',compact('system'));
  }

  public function executives()
  {
    $name ='executive';

    $executives = User::whereHas('roles', function ($query) use($name){
                        $query->where('name', 'like', '%'.$name.'%');
                    })->get(['id','firstname','lastname','bio','picture'])
                    ->values()
                    ->unique()
                    ->take(15);

    return response()->json($executives,$code=200);
  }

  public function contacts()
  {
    $contacts = Contact::latest()->get(['id','name','mobile'])->values()->unique(['id'])->take(5);

    return response()->json($contacts,$code=200);
  }

  public function images()
  {
    $images = Image::latest()->get(['id','subject','image'])->values()->unique(['id'])->take(5);

    return response()->json($images,$code=200);
  }

  public function themes()
  {
    $themes = Theme::latest()->get(['id','subject','semester'])->values()->unique(['id'])->take(1);

    return response()->json($themes,$code=200);
  }

  public function services()
  {
    $services = Service::latest()->get(['id','subject','time'])->values()->unique(['id']);

    return response()->json($services,$code=200);
  }

  public function socials()
  {
    $socials = Social::latest()->get(['id','name','url'])->values()->unique(['id']);

    return response()->json($socials,$code=200);
  }

  public function events()
  {
    $events = Event::latest()->get(['id','subject','description','url'])->values()->unique(['id'])->take(5);

    return response()->json($events,$code=200);
  }

  public function ministries()
  {
    $ministries = Ministry::latest()->get(['id','name','description','image'])->values()->unique(['id'])->take(5);

    return response()->json($ministries,$code=200);
  }

  public function libraries()
  {
    $libraries=Library::latest()->get(['id','name','description'])->values()->unique(['id'])->take(5);

    return response()->json($libraries,$code=200);
  }

}
