@extends('layouts.app')

@section('content')

<h4>Movie Persons</h4>

@foreach($persons as $person)
<div>
    <a href="{{ action('NewPersonController@show', $person->id) }}">{{$person->name}}</a>
</div>
@endforeach

{{$persons->links()}}

@endsection
