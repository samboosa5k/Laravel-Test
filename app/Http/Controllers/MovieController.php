<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movies()
    {
        $query = "SELECT * FROM `movies` WHERE `rating`>? ORDER BY `name` ASC LIMIT 10";

        $query_build = DB::table('movies')->where('rating', '>', 8)->orderby('name', 'asc')->limit(10);

        $movies = $query_build->get()->pluck('rating');
        return $movies;
    }
}
