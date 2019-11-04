<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;    // Added because of the ReviewRequest class

use App\Movie;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie)
    {
        $movie = Movie::findOrFail($movie);
        // $reviews = Review::where('movie_id', $movie)->get();
        $reviews = $movie->reviews()->get(); // Laravel eloquent method

        return view('reviews.index', compact('reviews', 'movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movie)
    {

        if (!auth()->check()) {
            return redirect('ReviewController@index');
        }

        $movie = Movie::findOrFail($movie);
        return view('reviews.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, $movie)
    {
        /* VALIDATION LOGIC moved to REVIEWREQUEST.php
        $this->validate(
            $request,
            [
                //
                'rating' => 'required|numeric|min:0|max:10',
                'text' => 'required|min:0|max:128'
            ]
        ); */

        //dd($movie);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->movie_id = $movie;
        $review->text = $request->input('text');
        $review->rating = $request->input('rating');
        $review->save();


        return redirect(action('ReviewController@index', $movie));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
