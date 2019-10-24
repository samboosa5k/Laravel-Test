<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $view = view('index', ['title' => 'My Little Brony']);

        //  ADD EXTRA VARS

        $view->with('text', 'asdf asdf asdf asdf asdf asdf asdf asd asd asdf asdf asf');

        return $view;
    }
}
