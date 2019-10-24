@extends('layout')

@section('content')

<h1 class="page-title">Reviews Page for -> {{ $movie->name }}</h1>

<div class="reviews-all">
    @if ($reviews->count() === 0)
    <div class="movie-review">No reviews :(</div>
    @else
    @foreach ($reviews as $review)
    <div class="movie-review">
        <h4>
            {{$review->rating}}
        </h4>
        <p class="movie-review__text">{{$review->text}}</p>
    </div>
    @endforeach
    @endif



    <a class="return-navigation" href="{{ action('NewMovieController@show', $movie)
 }}" style="width: 100%;">Back to the movie!</a>

    @endsection
