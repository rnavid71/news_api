<?php

namespace App\Http\Controllers;

use App\Models\GuardianNews;
use App\Models\NewsApi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guardian = GuardianNews::orderBy('id','DESC')->paginate(10);
        $newsapi = NewsApi::orderBy('id','DESC')->paginate(10);
        return view('welcome',compact('guardian','newsapi'));
    }
}
