<?php

namespace App\Http\clients;

use Exception;

class YoutubeClient
{

    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * gets a youtube video, you can add multiple search arguments
     */
    public function getYoutubeVideos(string $search_arguments, array $parts = ['snippet'])
    {
        $args = [
            '?key='.env('YOUTUBE_API_KEY'),
            '&part='.implode(",", $parts),
            '&q='.$search_arguments,
            '&maxResults=1'
        ];
        try {
            $endpoint = env('YOUTUBE_BASE_URL').'search'.implode($args);
            $response = $this->client->request('GET', $endpoint);
            $content = json_decode($response->getBody(), true);

            return $content;
        } catch (\Exception $e) {
            dd($endpoint);
           dd($e->getResponse());
        }
    }

}
