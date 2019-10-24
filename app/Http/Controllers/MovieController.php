<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        //  ORDER BY
        $orderby = $request->input('orderby', 'name');

        if (!in_array($orderby, ['name', 'rating', 'year'])) {
            $orderby = 'name';
        }

        //  OTHER QUERY PARAMS
        $orderway = $request->input('orderway', 'asc');
        $limit = $request->input('limit', 10);
        $page = max(1, $request->input('page', 1)); //  MAX = so that '0' can never happen
        $search = $request->input('search', null);
        $year = $request->input('year', null);
        $minrating = $request->input('minrating', null);

        //  INIT QUERY BUILDER
        $query = DB::table('movies');

        //  MODIFY QUERY BUILDER
        $query->orderby($orderby, $orderway)
            ->limit($limit)
            ->offset($page * $limit - $limit);  //  OFFSET == pagination

        //  MODIFY QUERY - SEARCH
        if ($search !== null) {
            $query->where('name', 'like', "%{$search}%");
        }

        //  MODIFY QUERY - YEAR
        if ($year !== null) {
            $query->where('year', $year);
        }

        //  MODIFY QUERY - MINRATING
        if ($minrating !== null) {
            $query->where('rating', '>', $minrating);
        }

        //  EXECUTE QUERY
        $movies = $query->get();
        return $movies;
    }

    public function cast_and_crew(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            return [];
        }

        // QUERY - MOVIE PERSON ID
        $people_id = DB::table('movie_person')
            ->where('movie_id', $id)
            ->pluck('person_id');

        //  QUERY - MOVIE PERSON NAMES
        $actors = DB::table('people')
            ->distinct()                //  DON'T SELECT DUPLICATES
            ->whereIn('id', $people_id)
            ->pluck('name')
            ->toArray();


        //  EXECUTE QUERY
        return ($actors);
    }

    public function movies()
    {
        $query_build = DB::table('movies')->where('rating', '>', 8)->orderby('name', 'asc')->limit(10);

        $movies = $query_build->get();
        return $movies;
    }
}
