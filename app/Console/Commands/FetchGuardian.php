<?php

namespace App\Console\Commands;

use App\Models\GuardianNews;
use App\Models\UpdateNews;
use Carbon\Carbon;
use DateTime;
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
        // after running this command we log it
        UpdateNews::create([
            'source' => 'guardian',
        ]);
        $apiKey = env('Guardian_api');
        $client = new Client();
        $response = $client->request('GET','https://content.guardianapis.com/search?api-key='.$apiKey);
        if ($response->getStatusCode() == 200) {
            $result = json_decode($response->getBody(),true);
            foreach ($result['response']['results'] as $item){
                $published_time = Carbon::parse($item['webPublicationDate'])->format('Y-m-d H:i:s');
                // Guardian api gives us an id which supposed to be unique; so we use it as an identifier to check for
                // duplicate entry
                if($this->check_for_duplicate($item['id'])){
                    // check to see if the news is for current year or later
                    $year = Carbon::parse($item['webPublicationDate'])->format('Y');
                    GuardianNews::create([
                        'title' => $item['webTitle'],
                        'news_id' => $item['id'],
                        'section_id' => $item['sectionId'],
                        'section_name' => $item['sectionName'],
                        'type' => $item['type'],
                        'url' => $item['webUrl'],
                        'published_at' => $year < 2024 ? null : $published_time,
                        'updated_at' => now(),
                        'created_at' => now()
                    ]);
                }
            }
        }
    }

    private function check_for_duplicate($id){
        return !(GuardianNews::where('news_id', $id)->get()->count() > 0);
    }
}
