<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\GuardianFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\GuardianCollection;
use App\Http\Resources\Api\V1\GuardianResource;
use App\Models\GuardianNews;
use Illuminate\Http\Request;

class GuardianApi extends Controller
{
    public function index(Request $request){
        $filter = new GuardianFilter();
        $filter_array = $filter->transform($request);

        $guardian_news = GuardianNews::where($filter_array);
        return new GuardianCollection($guardian_news->paginate(10)->appends($request->query()));
    }

    public function showNews($id){
        $news = GuardianNews::find($id);
        return new GuardianResource($news);
    }
}
