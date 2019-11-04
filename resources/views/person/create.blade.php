@extends('layouts.app')

@section('content')

<h4>Create a new Person</h4>

{{-- Errors --}}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- Errors: end --}}

<form method="post" action="{{ action('NewPersonController@store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="enter name...">

        <label for="photo">Photo</label>
        <input type="text" class="form-control" name="photo_url" id="photo" placeholder="location of photo">

        <label for="biography">Biography</label>
        <input type="text" class="form-control" name="biography" id="biography" placeholder="Enter the biography">

        <label for="profession">Profession</label>
        <br>
        <select name="profession_id" id="profession">
            @foreach ($professions as $profession)
            <option value={{$profession->id}}>{{$profession->name}}</option>
            @endforeach
        </select>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
