<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        return DB::table('reviews')
            ->get();
    }

    //  id 	user_id 	movie_id 	text 	rating 	created_at 	updated_at

    public function store(Request $request)
    {
        $id = $request->input('id');
        $user_id = $request->input('user_id');
        $movie_id = $request->input('movie_id');
        $text = $request->input('text');
        $rating = $request->input('rating');
        //  TIMESTAMPS --> automatic?

        //  INIT QUERY BUILDER
        DB::table('reviews')
            ->insert([
                'id' => 2,
                'user_id' => 1,
                'movie_id' => 441,
                'text' => 'best movie ever',
                'rating' => 10
            ]);

        $new_id = DB::getPdo()->lastInsertId();

        return [
            'status' => 'successfully inserted',
            'review_id' => $new_id
        ];
    }
}
