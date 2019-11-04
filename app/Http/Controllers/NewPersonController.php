<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Person;
use App\Profession;

class NewPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::paginate(20);

        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();

        return view('person.create', compact('professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
        $this->validate($request, [
            'name' => 'required|max:127',
            'photo_url' => 'max:127'
        ], [
            'name.required' => 'A name is required'
        ]);

        /* $person = new Person;
                        $person->name = $request->input('person');
                        $person->photo_url = $request->input('photo_url');
                        $person->biography = $request->input('biography');
                        $person->save(); */

        $person = Person::create($request->all());  // Shorter way of writinh what's above

        //  Names of input fields MUST match database column names
        return redirect((action('NewPersonController@index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);

        return view('person.show', compact('person'));
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
