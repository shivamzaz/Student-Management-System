<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __constructor()
    {

    }

    /**
     * Get transformed data of a particular Model
     * @param  mixed $object
     * @param  callback[mixed] $callback
     * @return array
     */
    public function getTransformedData($object, $callback, $parseIncludesArr = [])
    {
    	$arraySerializer = new \Spatie\Fractalistic\ArraySerializer();

      $parseIncludesArr = array_unique(array_merge($parseIncludesArr, explode(',', request()->get('includes'))));

    	return fractal($object, $callback)
                  ->serializeWith($arraySerializer)
                  ->parseIncludes($parseIncludesArr)
                  ->toArray();
    }

    /**
     * Get transformed data with pagination of a particular Model
     * @param  mixed $paginatedObject
     * @param  callback[mixed] $callback
     * @return array
     */
    public function getTransformedDataWithPagination($paginatedObject, $callback, $metaArr = [], $parseIncludesArr = [])
    {
      $arraySerializer = new \Spatie\Fractal\ArraySerializer();

      $parseIncludesArr = array_unique(array_merge($parseIncludesArr, explode(',', request()->get('includes'))));

      $paginatedObject->appends(request()->except('_token', '_method'));

      $collection = $paginatedObject->getCollection();

      return fractal()
                ->collection($collection, $callback)
                ->parseIncludes($parseIncludesArr)
                ->serializeWith($arraySerializer)
                ->paginateWith(new \League\Fractal\Pagination\IlluminatePaginatorAdapter($paginatedObject))
                ->addMeta($metaArr)
                ->toArray();
    }

    /**
     * Get transformed data of a particular Model with meta data
     *
     * @param  mixed      $object
     * @param  callback   $callback
     * @param  array      $metaArr
     * @return array
     */
    public function getTransformedDataWithMeta($object, $callback, $metaArr = [], $parseIncludesArr = [])
    {
      $arraySerializer = new \Spatie\Fractal\ArraySerializer();

      $parseIncludesArr = array_unique(array_merge($parseIncludesArr, explode(',', request()->get('includes'))));

      return fractal($object, $callback)
                  ->serializeWith($arraySerializer)
                  ->parseIncludes($parseIncludesArr)
                  ->addMeta($metaArr)
                  ->toArray();
    }
}
