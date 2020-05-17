@extends('layout')
<div class="links center">
    <a href="{{route('random')}}">Random movie</a>
    <a href="{{route('welcome')}}">home</a>
</div>
@section('content')
<div class='trailer-container'>
    <h1>Trending movies</h1>
    @foreach ($data as $trailer)
    <div class='trailer-block'>
            <h2>{{$trailer['title']}}</h2>
            <iframe
                class='trailer'
                width="560"
                height="315"
                src="{{$trailer['trailer']['url']}}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <div class='trailer-information-block text-left'>
                <p>{{$trailer['overview']}}</p>
                <p>release date: {{$data[0]['release_date']}}</p>
                <p>vote avarage: {{$data[0]['vote_average']}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
