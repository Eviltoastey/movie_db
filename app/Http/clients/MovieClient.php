<?php

namespace App\Http\clients;
use App\Http\clients\IMDBClient as IMDB;
use App\Http\clients\YoutubeClient as YouTube;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Support\Facades\Cache;

class MovieClient
{

    private $imdb_client;
    private $youtube_client;

    public function __construct() {
        $this->imdb_client = new IMDB();
        $this->youtube_client = new YouTube();
    }

    /**
     * Gets a random movie from the IMDB list with a random id
     * and finds a fitting trailer for it
     */
    public function getRandomMovie()
    {

        $movie_json = $this->imdb_client->getRandomTrendingMovie();
        $movie_title = $movie_json['original_title'];
        $movie_json['trailer'] = $this->youtube_client->getYoutubeVideos($movie_title.' movie trailer');

        return MovieResource::make([$movie_json])->resolve();

    }

    /**
     * Gets a list of trending movies from the IMDB trending list
     * and finds fitting trailers for it
     * results are cached
     */
    public function getMovies()
    {
        $content = Cache::remember('random_movie', env('CACHE_TIME'), function () {
            $movie_json = $this->imdb_client->getTrendingMovies();
            $movies_with_trailer = array();
            foreach($movie_json as $movie){

                if (isset($movie['original_title'])){
                    $movie_title = $movie['original_title'];
                    $movie['trailer'] = $this->youtube_client->getYoutubeVideos($movie_title.' movie trailer');
                    array_push($movies_with_trailer, $movie);
                }
            }

            return  MovieResource::make($movies_with_trailer)->resolve();
        });

        return $content;
    }

}
