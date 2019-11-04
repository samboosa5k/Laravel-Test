<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class NewMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderby('id', 'asc')->offset(440)->limit(10)->get();

        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        // return $movie->genres; // THIS RETURNS ALL ASsociATED GENRES WTF MAGIC
        //  Not necessary to do in the 'show' blade as you can access $movie->genres in there

        return view('movies.show', compact('movie'));
    }
}
