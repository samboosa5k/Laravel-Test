@extends('layout')

@section('content')

<h1 class="page-title">Movies</h1>

@foreach ($movies as $movie)
<div class="movie-single">
    <div class="movie-image-container">
        <img class="movie-image" src={{$movie->poster_url}} alt="">
    </div>
    <h2>{{$movie->name}}</h2>
    <p>{{$movie->year}}</p>
    <a class="return-navigation" href="{{ action('NewMovieController@show', $movie->id)
 }}" style="width: 100%;">Show detail!</a>
</div>

@endforeach

@endsection
