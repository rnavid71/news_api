<?php

namespace App\Http\Controllers;

use App\Models\GuardianNews;
use App\Models\NewsApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $guardian = GuardianNews::all()->sortByDesc('id')->take(20);
        $newsapi = NewsApi::all()->sortByDesc('id')->take(20);
        return view('admin-dashboard',compact(['guardian','newsapi']));
    }

    public function guardian_posts(){
        $guardian = GuardianNews::paginate(10);
        return view('admin-guardian',compact('guardian'));
    }

    public function newsapi_posts(){
        $newsapi = NewsApi::orderBy('id', 'DESC')->paginate(10);
        return view('admin-newsapi',compact('newsapi'));
    }

    public function update_guardian(Request $request, GuardianNews $id){
        $result = $request->validate([
            'title' => 'required|string|max:1000'
        ]);
        $id->update($result);
        return redirect()->route('guardian');
    }

    public function update_newsapi(Request $request, NewsApi $id){
        $result = $request->validate([
            'title' => 'required|string|max:1000',
            'description' => 'nullable|string|max:2000'
        ]);
        $id->update($result);
        return redirect()->route('newsapi');
    }

    public function test(){
        // newsapi.org
//        $apiKey = env('News_api');
//        $client = new Client();
//        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey);
//        dd(json_decode($response->getBody(),true));

        //guardian
//        $apiKey = env('Guardian_api');
//        $client = new Client();
//        $response = $client->request('GET','https://content.guardianapis.com/search?api-key='.$apiKey);
//        dd(json_decode($response->getBody(),true));
        return true;
    }
}
