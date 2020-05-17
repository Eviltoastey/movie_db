<?php

namespace App\Http\Controllers;

use App\Http\clients\MovieClient;
use Illuminate\Http\Request;
use DB;

class MovieController extends Controller
{

    // VIEW

    /**
     * return random view
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        return view('movies.random', ['data' => $this->randomAPI()]);
    }

    /**
     * return trending view
     *
     * @return \Illuminate\Http\Response
     */
    public function trending()
    {
        return view('movies.trending', ['data' =>  $this->trendingAPI()]);
    }

    /**
     * request movie routes
     *
     * @return \Illuminate\Http\Response
     */
    public function request()
    {
        return view('movies.request');
    }

    // FORM

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'reason' => 'required',
            'movie_title' => 'required',
            'email' => 'required'
        ]);

        $data = [
            'firstName' => $request->input('first_name'),
            'lastName' => $request->input('last_name'),
            'body' => $request->input('reason'),
            'title' => $request->input('movie_title'),
            'email' =>$request->input('email')
        ];

        DB::table('movie_requests')->insert($data);

        return redirect(route('welcome', ['confirm' => true]));

    }

    // API

    /**
     * Gets a random movie
     */
    public function randomAPI()
    {
        $resource = new MovieClient();

        return $resource->getRandomMovie();
    }

    /**
     * Gets a collection of trending video's
     */
    public function trendingAPI()
    {
        $resource = new MovieClient();

        return $resource->getMovies();
    }
}
