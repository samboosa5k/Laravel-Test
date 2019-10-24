<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieControllerEloquent extends Controller
{
    public function index(Request $request)
    {
        $theMovieId = $request->input('id');

        //dd($theMovieName);
        $movie = \App\Movie::where('id', $theMovieId)
            ->limit(1)
            ->get();

        return [
            'id' => $movie->pluck('name'),
            'year' => $movie->pluck('year'),
            'poster' => $movie->pluck('poster_url')
        ];
    }

    public function update(Request $request)
    {
        $rating = $request->post('rating');
        $theMovieId = $request->input('id');

        $movie = \App\Movie::where('id', $theMovieId)->first();

        $movie->rating = $rating;

        $movie->save();
    }
}
