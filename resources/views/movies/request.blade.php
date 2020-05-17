@extends('layout')
<div class="links center">
    <a href="{{route('random')}}">Random movie</a>
    <a href="{{route('trending')}}">Trending movies</a>
    <a href="{{route('welcome')}}">home</a>
</div>
@section('content')
<div class='center'>
    <form method="POST" action="{{route('store')}}">
            @csrf
            <p>
                <label>Movie title</label>
                <input type="text" name="movie_title">
                @if ($errors->has('movie_title'))
                    <p class='error-message'>This field is required</p>
                @endif
            </p>
            <p>
                <label>First name</label>
                <input type="text" name="first_name">
                @if ($errors->has('first_name'))
                <p class='error-message'>This field is required</p>
                @endif
            </p>
            <p>
                <label>Last name</label>
                <input type="text" name="last_name">
                @if ($errors->has('last_name'))
                <p class='error-message'>This field is required</p>
                @endif
            </p>
            <p>
                <label>Email Address</label>
                <input type="email" name="email">
                @if ($errors->has('email'))
                <p class='error-message'>This field is required</p>
                 @endif
                </p>
            <p>
                <label>Add reason</label>
                <input type="text" name="reason">
                @if ($errors->has('reason'))
                    <p class='error-message'>This field is required</p>
                @endif
            </p>

            <button type="submit">send!</button>
        </form>
</div>
@endsection
