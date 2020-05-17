@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if (app('request')->input('confirm'))
                <h2 class='confirmed'>Movie request send</h2>
            @endif
            <div class="title m-b-md">
                Movie API
            </div>

            <div class="links">
                <a href="{{route('random')}}">Random movie</a>
                <a href="{{route('trending')}}">Trending movies</a>
                <a href="{{route('request')}}">request a movie</a>
            </div>
        </div>
    </div>
@endsection

