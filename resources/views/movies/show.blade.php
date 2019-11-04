@extends('layout')

@section('content')

<h1 class="page-title">Movie Page - {{$movie->name}}</h1>

<div class="movie-single">
    <h2>{{$movie->name}}</h2>
    <p>{{$movie->year}}</p>
    <img src={{$movie->poster_url}} style="width: 256px; height: auto;" alt="">


    @foreach ($movie->genres as $genre)
    <p>{{$genre->name}}</p>
    @endforeach

</div>

<a class="return-navigation" href="{{ action('NewMovieController@index')
 }}" style="width: 100%;">Back to movies!</a>

<a class="return-navigation" href="{{ action('ReviewController@index', $movie->id)
 }}" style="width: 100%;">See reviews!</a>


@endsection
