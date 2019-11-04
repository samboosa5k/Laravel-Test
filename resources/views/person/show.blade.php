@extends('layouts.app')

@section('content')

{{  }}
<h1>{{$person->name}}</h1>
<a href="{{  action('NewPersonController@index')   }}">Back to the list of people</a>

@endsection
