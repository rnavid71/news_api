<?php

namespace App\Http\Controllers;

use App\Models\GuardianNews;
use App\Models\NewsApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $guardian = GuardianNews::all()->take(10);
        $newsapi = NewsApi::all()->take(10);
        return view('admin-dashboard',compact(['guardian','newsapi']));
    }

    public function test(){
        // newsapi.org
        $apiKey = env('News_api');
        $client = new Client();
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey);
        dd(json_decode($response->getBody(),true));

        //guardian
//        $apiKey = env('Guardian_api');
//        $client = new Client();
//        $response = $client->request('GET','https://content.guardianapis.com/search?api-key='.$apiKey);
//        dd(json_decode($response->getBody(),true));
    }
}
