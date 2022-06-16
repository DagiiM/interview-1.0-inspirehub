<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
  private function successReply($data,$code)
  {
    return response()->json($data,$code);
  }

  protected function errorReply($message,$code)
  {
    return response()->json(['error'=>$message,'code'=>$code],$code);
  }

  protected function showMessage($type,$message,$code=200)
  {
    return $this->successReply(['type'=>$type,'message'=>$message,'code'=>$code],$code);
  }

}