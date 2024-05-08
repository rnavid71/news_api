<?php

namespace App\Console\Commands;

use App\Models\GuardianNews;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchGuardian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:guardian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch News from Guardian and store it in table: guardian_api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $last_news_publish_date = GuardianNews::get()->last();
        $apiKey = env('Guardian_api');
        $client = new Client();
        $response = $client->request('GET','https://content.guardianapis.com/search?api-key='.$apiKey);
        if ($response->getStatusCode() == 200) {
            $result = json_decode($response->getBody(),true);
            foreach ($result['response']['results'] as $item){
                $published = Carbon::parse($item['webPublicationDate'])->format('Y-m-d H:i:s');
                if(1===1){
                    $year = Carbon::parse($item['webPublicationDate'])->format('Y');
                    GuardianNews::create([
                        'title' => $item['webTitle'],
                        'section_id' => $item['sectionId'],
                        'section_name' => $item['sectionName'],
                        'type' => $item['type'],
                        'url' => $item['webUrl'],
                        'published_at' => $year < 2024 ? null : $published,
                        'updated_at' => now(),
                        'created_at' => now()
                    ]);
                }
            }
        }
    }
}
