<?php

namespace App\Http\clients;

use Exception;

class IMDBClient
{

    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * gets some data from the movie database API
     * you can modify the data you get with data_set
     * put the url shortcut you want to retreive from there
     */
    private function getIMDBData(string $data_set)
    {
        $endpoint = env('IMDB_BASE_URL').$data_set.'?api_key='.env('IMDB_API_KEY');
        $response = $this->client->request('GET', $endpoint);

        $status = $response->getStatusCode();

        if ($status == 200){
            return $content = json_decode($response->getBody(), true);
        }

        return throwException(Exception);
    }

    /**
     * gets a list of trending movies
     */
    public function getTrendingMovies()
    {
        $trending_movies = $this->getIMDBData('trending/all/day');

        return $trending_movies['results'];
    }

    /**
     * gets a random movie.
     * note: some id's dont excist in the API so when I can't find
     * an id I will run this function again
     */
    public function getRandomTrendingMovie()
    {
        try{
            $random_movie_id = rand(1,87211);
            $random_movie = $this->getIMDBData('movie/'.$random_movie_id);

            return $random_movie;
        } catch(Exception $e){
           return $this->getRandomTrendingMovie();
        }
    }
}
