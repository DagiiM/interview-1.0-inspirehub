<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends WebController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $directory = 'img';

    $protect = ['logo.png','close.png','complete.gif','default_image_cover.jpg','empty.gif','next.png','prev.png','videobg.jpg','loading.gif','loader.gif','cu1.jpg'];
  //  $protect = ['logo.png','close.png','complete.gif','default_image_cover.jpg','empty.gif','next.png','prev.png','videobg.jpg','loading.gif','loader.gif','cu1.jpg','profile/default_cover_image.jpg','profile/default_female_image.jpeg','profile/default_female_image.png','profile/default_male_image.jpg','profile/default_male_image.png','profile/empty.gif'];

  function dirToArray($dir) {

      $result = array();

      $cdir = scandir($dir);


      foreach ($cdir as $key => $value)
      {
        if (!in_array($value,array(".","..")))
        {
           if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
           {
              $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
           }
           else
           {
              $result[] = $value;
           }
        }

      }

      return $result;
    }

      $files=collect(dirToArray($directory));

    //  $content=array_diff($source,$protect);

      return view('maintenance.index',['files'=>$files]);
  }

}
