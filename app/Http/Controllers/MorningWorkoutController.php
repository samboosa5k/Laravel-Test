<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MorningWorkoutController extends Controller
{
    public function movies()
    {
        $query_build = DB::table('movies')->where('rating', '>', 8)->orderby('name', 'asc')->limit(10);

        $movies = $query_build->get();
        return $movies;
    }
}
