@extends('layout')

@section('content')

<h1 class="page-title">Create a review for {{$movie->name}}</h1>

<?php //dd($movie); ?>

{{-- @if (count($errors) > 0)

@foreach ($errors->all() as $error)
<p>{{$error}}</p>
@endforeach

@endif --}}

<div class="reviews-all">
    <form class="movie-review__form" action="{{ action('ReviewController@store', $movie->id) }}" method="post">
        @csrf
        <div class="{{$errors->has('rating') ? "error-field" : ""}}">
            <label for="value">Rating</label>
            <input name="rating" type="number" value="{{ old('rating') }}">
            @if ($errors->has('rating'))
            <p class="error">{{$errors->first('rating')}}</p>
            @endif
        </div>

        <div>
            <label for="value">Text</label>
            <textarea name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea>
            @if ($errors->has('text'))
            <p class="error">{{$errors->first('text')}}</p>
            @endif
        </div>

        <input type="submit">

    </form>
</div>

@endsection
