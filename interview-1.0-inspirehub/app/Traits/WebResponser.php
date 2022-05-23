<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

trait WebResponser
{
    private function successResponse($view, $data, $code)
    {
        return response()->view($view,['data'=>$data]);
    }

    protected function errorResponse($type,$message)
    {
        return back()->with($type,$message);
    }

    protected function showAll($view,Collection $collection, $code = 200)
    {
        if ($collection->isEmpty())
        {
            return $this->successResponse($view,$collection,$code);
        }

        return $this->successResponse($view,$collection,$code);
    }

    protected function showOne($view,Model $instance, $code = 200)
    {
        return $this->successResponse($view,$instance,$code);
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

