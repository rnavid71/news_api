<?php

namespace App\Console\Commands;

use App\Models\GuardianNews;
use App\Models\NewsApi;
use App\Models\UpdateNews;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class FetchNewsApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:newsapi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches latest news from Newsapi.org and inserts it into the news_api Table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // after running this command we log it
        UpdateNews::create([
            'source' => 'newsapi',
        ]);
        $apiKey = env('News_api');
        $client = new Client();
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey);

        if ($response->getStatusCode() == 200) {
            $newsData = json_decode($response->getBody(), true);
            foreach ($newsData['articles'] as $newsItem) {
                $published = Carbon::parse($newsItem['publishedAt'])->format('Y-m-d H:i:s');
                $check = $this->check_for_duplicate($newsItem['url']);
                if($check){
                    // url is always unique and since we don`t have an id in this api; will use it as a unique identifier
                    $year = Carbon::parse($newsItem['publishedAt'])->format('Y');
                    NewsApi::create([
                        'title' => $newsItem['title'],
                        'description' => $newsItem['description'],
                        'url' => $newsItem['url'],
                        'author' => $newsItem['author'],
                        'source' => $newsItem['source']['name'],
                        'published_at' => $year < 2024 ? null : $published,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }
    }

    private function check_for_duplicate($url){
        return !(NewsApi::where('url', $url)->get()->count() > 0);
    }
}
