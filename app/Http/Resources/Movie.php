<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $return_json = array();
        foreach($this->resource as $resource){
            array_push($return_json, [
                'title' => $resource['title'],
                'release_date' => $resource['release_date'],
                'vote_average' => $resource['vote_average'],
                'overview' => $resource['overview'],
                'trailer' => [
                    'snippet'=> $resource['trailer']['items'][0]['snippet'],
                    'url'=> 'https://www.youtube.com/embed/'.$resource['trailer']['items'][0]['id']['videoId'],
                    'channel_title'=> $resource['trailer']['items'][0]['snippet']['channelTitle']
                ]
            ]);
        }

        return $return_json;
    }
}
