<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\NewsapiFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\NewsCollection;
use App\Http\Resources\Api\V1\NewsResource;
use App\Models\NewsApi;
use Illuminate\Http\Request;

class NewsapiApi extends Controller
{
    public function index(Request $request){
        $filter = new NewsapiFilter;
        $filter_array = $filter->transform($request);
        $news = NewsApi::where($filter_array);
        return new NewsCollection($news->paginate(10)->appends($request->query()));
    }

    public function showNews($id){
        $news = NewsApi::find($id);
        return new NewsResource($news);
    }
}
