<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;


trait ApiResponser 
{
    private function successResponse($data, $code)
    {
    	return response()->json($data, $code);
    }
    protected function errorResponse($message, $code)
    {
    	return response()->json(['error' => $message, 'code' => $code], $code);
    }
    // protected function showAll(Collection $collection, $code = 200)
    // {
    //     return $this->successResponse(['data' => $collection], $code);
    // }
    protected function showAll(Collection $collection, $code = 200)
    {
        if($collection->isEmpty())
        {
            return $this->successResponse($collection, $code);
        }
        
        $collection = $this->filterData($collection);
        $collection = $this->sortData($collection);
        $collection = $this->paginate($collection);
        return $this->successResponse($collection, $code);
    } 
    protected function showOne(Model $model, $code = 200)
    {
    	return $this->successResponse(['data' => $model], $code);
    }
     protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }

    
    protected function paginate(Collection $collection)
    {
      $rules = [
          'per_page' => 'integer|min:2|max:50',
      ];
      
      Validator::validate(request()->all(), $rules);
      $page = LengthAwarePaginator::resolveCurrentPage();
      $perPage = 10;
      
      if(request()->has('per_page'))
      {
          $perPage = (int) request()->per_page;
      }
      
      $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
      
      $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPage(),
            ]);
      
      $paginated->appends(request()->all());
      
      return $paginated;
    }

    
  protected function filterData(Collection $collection)  
  {
    foreach(request()->query() as $query => $value)
    {
       // $attribute = $transformer::originalAttribute($query);
         
        if(isset($query, $value))
        {
            $collection = $collection->where($query, $value);
        }
    }
    return $collection;
  }
  protected function sortData(Collection $collection)
  {
    if(request()->has('sort_by'))
    {
        //$attribute = $transformer::originalAttribute(request()->sort_by);
        $collection = $collection->sortBy->{(request()->sort_by)};
    }
   /* if(request()->has('location'))
    {
        $attribute1 = request()->location;
        $collection = Product::where('location', '=', $attribute1)->get();
    }*/
    return $collection;
  }


}