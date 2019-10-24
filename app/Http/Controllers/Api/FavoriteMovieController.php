<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\FavoriteMovie;

use Illuminate\Http\Request;


class FavoriteMovieController extends Controller
{
    public function toggle(Request $request)
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0'); //   ESSENTIAL

        $user_id = $request->input('user_id');
        $movie_id  = $request->input('movie_id');

        $favorite_movie = FavoriteMovie::where('user_id', $user_id)->where('movie_id', $movie_id)->first();

        if ($favorite_movie === null) {
            $favorite_movie = new FavoriteMovie;
            $favorite_movie->user_id = $user_id;
            $favorite_movie->movie_id = $movie_id;
            $favorite_movie->save();

            return [
                'status' => 'success',
                'message' => 'Movie was added to favorites',
                'data' => [
                    'favorite' => true
                ]
            ];
        } else {
            $favorite_movie->delete();
            return [
                'status' => 'success',
                'message' => 'Movie was removed from favorites',
                'data' => [
                    'favorite' => false
                ]
            ];
        }
    }

    public function status(Request $request)
    {
        $user_id = $request->input('user_id');
        $movie_id  = $request->input('movie_id');

        $favorite_movie = FavoriteMovie::where('user_id', '=', $user_id)->where('movie_id', '=', $movie_id)->get();

        if (count($favorite_movie) === 0) {
            return ['favorite' => false];
        } else {
            return ['favorite' => true];
        }
    }
}
