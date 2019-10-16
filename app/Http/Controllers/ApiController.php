<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ApiController extends Controller

{
    public function index()
    {
        // the logic of your page will be here

        $top10 = DB::select('SELECT * FROM `movies` WHERE 1 ORDER BY `rating` DESC LIMIT 10');

        return $top10;

        // as response we will return an array of data
        return [
            'success' => true,
            'message' => 'Response successfully returned.',
            'errors' => [],
            'data' => []
        ];
    }

    public function search_people(Request $request)
    {
        $people_name = $request->input('name', 'John');
        $query = "SELECT * FROM `people` WHERE `name` LIKE ?";

        $people = DB::select($query, ['%' . $people_name . '%']);

        return $people;
    }

    public function cast_and_crew(Request $request)
    {
        /* dd($request); */
        if (!$request->has('id')) {
            return ["Errpr" => "No id supplied"];
        }

        $movie_id = $request->input('id', 1);


        $query = "SELECT * FROM `movie_person` WHERE `movie_id`= ?";
        $movie_person = DB::select($query, [$movie_id]);
        $person_array = [];

        foreach ($movie_person as $person) {
            $person_array[] = $person->person_id;
        }

        $person_id_string = join(', ', $person_array);
        $query_2 = "SELECT * FROM `people` WHERE `id` IN ({$person_id_string})";
        $person_id_names = DB::select($query_2);

        return $person_id_names;
    }

    public function form()
    {
        //
        return view('form');
    }

    public function handleForm(Request $request)
    {
        $request = request();

        $search_term = $request->input('search');

        $request->request->add(['name' => $search_term]);
    }
}
