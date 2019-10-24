<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function store()
    {
        $collection = new Collection;
        $collection->name = 'Top history movies';
        $collection->description = 'He who forgets his own history is destined to repeat it.';

        // associate the collection with the user 1
        $collection->user()->associate(1);

        // associate the collection with the genre 9 (history)
        $collection->genre()->associate(9);
        $collection->save();

        // attach 5 movies to the collection, giving appropriate priorities

        $collection->movies()->attach([624, 780, 460, 213, 316]);
    }

    public function user_lists()
    {
        $user = \App\User::find(1);

        $collections = $user->collections()->with('movies')->with('genre')->get();

        $movies = [];

        foreach ($collections as $collection) {
            $movies[] = $collection->movies;
        }

        return view('welcome');

        return $user->collections;  // Name of table specified
        //  in relation of User.php
    }
}
