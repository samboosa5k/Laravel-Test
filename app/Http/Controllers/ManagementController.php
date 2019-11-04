<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the pizzal builder admin area, soon you will be able to do some really cool things!'
        ]);
    }
}
