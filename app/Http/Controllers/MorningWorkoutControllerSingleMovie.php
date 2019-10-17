<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MorningWorkoutControllerSingleMovie extends Controller
{
    public function movie()
    {
        $query_build = DB::table('movies')
            ->where('name', 'Rambo');

        $movie = $query_build
            ->get();

        $movie_id = $query_build
            ->value('id');

        $genre_id = DB::table('genre_movie')
            ->where('movie_id', $movie_id)
            ->value('genre_id');

        $genre = DB::table('genres')
            ->where('id', $genre_id)
            ->pluck('name')
            ->first();

        $people_id = DB::table('movie_person')
            ->where('movie_id', $movie_id)
            ->pluck('person_id');

        $actors = DB::table('people')
            ->whereIn('id', $people_id)
            ->pluck('name')
            ->toArray();

        return [
            'movie' => $movie[0],
            'movie_id' => $movie_id,
            'genre_id' => $genre_id,
            'genre' => $genre,
            'actors' => array_unique($actors)
        ];
    }
}
