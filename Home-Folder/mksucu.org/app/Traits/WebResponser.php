<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;


trait WebResponser
{
  private function successResponse($view, $data, $data2, $user, $code)
  {
    return response()->view($view,['data'=>$data,'data2'=>$data2,'user'=>$user]);
  }

  protected function errorResponse($type,$message)
  {
    return back()->with($type,$message);
  }

  protected function showAll($view,Collection $collection,Model $collection2 = NULL, Model $user = NULL, $code = 200)
  {
    if ($collection->isEmpty())
    {
      return $this->successResponse($view,$collection,$collection2,$user,$code);
    }

    $collection = $this->sortData($collection);//Sort Data from the collection

    $collection = $this->searchData($collection); //Search from the collection

    $collection = $this->paginate($collection);//paginate Data from the collection

    $collection = $this->cacheResponse($collection); //Caching The Response

    return $this->successResponse($view,$collection,$collection2,$user,$code);
  }

  protected function showOne($view,Model $instance,Model $instance2 = NULL,Model $instance3 = NULL, $code = 200)
  {
    return $this->successResponse($view,$instance,$instance2,$instance3,$code);
  }


  protected function filterData(Collection $collection, $transformer)
  {
    foreach (request()->query() as $query => $value)
     {
       $attribute = $transformer::originalAttribute($query);

       if(isset($attribute, $value))
       {
         $collection = $collection->where($attribute, $value);
       }
    }
    return $collection;
  }

  protected function sortData(Collection $collection)
  {
    if (request()->has('sort_by'))
     {
      $sort = $_GET['sort_by'];
      $collection = $collection->sortBy->{$sort};
    }

    return $collection;
  }

  protected function searchData(Collection $collection)
  {
    if (request()->has('query'))
     {
      $search_text = $_GET['query'];

      //$collection = $collection->where('*','LIKE','%'.$search_text.'%');
      $collection = $collection->where('*','LIKE','%'.$search_text.'%');
    }
    return $collection;
  }

  protected function paginate(Collection $collection)
  {

    $rules = [
      'per_page' => 'integer|min:2|max:50',
    ];

    Validator::validate(request()->all(),$rules);

    $page = LengthAwarePaginator::resolveCurrentPage();

    $perPage = 50;

    if (request()->has('per_page'))
     {
      $perPage = (int) request()->per_page;
    }

    $results = $collection->slice(($page-1)*$perPage,$perPage)->values();

    $paginated = new LengthAwarePaginator($results, $collection->count(),$perPage, $page, [
      'path' => LengthAwarePaginator::resolveCurrentPath(),
    ]);

    $paginated->appends(request()->all());

    return $paginated;
  }

  protected function cacheResponse($data)
  {
    $url = request()->url();

    $queryParams = request()->query();

    ksort($queryParams);

    $queryString = http_build_query($queryParams);

    $fullUrl = "{$url}?{$queryString}";

    return Cache::remember($fullUrl, 30/60, function() use($data){
      return $data;
    });
  }

}
