@extends('layout')
<div class="links center">
    <a href="{{route('trending')}}">Trending movies</a>
    <a href="{{route('welcome')}}">home</a>
</div>
@section('content')
<div class='trailer-container center'>
    <h1>Random movie</h1>
    <div class='trailer-block'>
        <h2 class='text-align-left'>{{$data[0]['title']}}</h2>
        <iframe
            class='trailer'
            width="560"
            height="315"
            src="{{$data[0]['trailer']['url']}}"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
        <div class='trailer-information-block text-left'>
            <p>{{$data[0]['overview']}}</p>
            <p>release date: {{$data[0]['release_date']}}</p>
            <p>vote avarage: {{$data[0]['vote_average']}}</p>
        </div>
    </div>
</div>
@endsection
