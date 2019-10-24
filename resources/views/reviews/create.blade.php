@extends('layout')

@section('content')

<h1 class="page-title">Create a review for {{$movie->name}}</h1>

<?php //dd($movie); ?>

<div>
    <form action="{{ action('ReviewController@store', $movie->id) }}" method="post">
        @csrf
        <div>
            <label for="value">Value</label>
            <input name="rating" type="number">
        </div>

        <div>
            <label for="value">Text</label>
            <textarea name="text" id="" cols="30" rows="10"></textarea>
        </div>

        <input type="submit">

    </form>
</div>

@endsection
