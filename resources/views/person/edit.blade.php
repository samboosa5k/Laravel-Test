@extends('layout')

@section('content')
{{!! Form::open(['url'=> '/person', 'method'=>'post']) !!}}

{{ !! Form::text}}

{{!! Form::close() !!}}
@endsection
