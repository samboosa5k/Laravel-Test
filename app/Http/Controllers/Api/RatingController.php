<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function index()
    {
        return Rating::all();
    }

    public function store()
    {
        $rating = new Rating;
        $rating->movie_id = 441;
        $rating->user_id = 1;
        $rating->value = 10;
        $rating->save();

        return [
            'status' => 'success',
            'data' => [
                'id' => $rating->id
            ]
        ];
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $value = $request->input('value');

        $rating = Rating::find($id);

        if (!$rating) {
            return [
                'message' => 'Rating with id {$id} was not found',
                'errur' => 'failllll',
            ];
        }

        $rating->value = $value;
        $rating->save();

        return [
            'status' => 'sucess',
            'data' => [],
        ];
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $value = $request->input('value');

        $rating = Rating::find($id);

        if (!$rating) {
            return [
                'message' => 'Rating with id {$id} was not found',
                'errur' => 'failllll',
            ];
        }

        $rating->value = $value;
        $rating->delete();

        return [
            'status' => 'Delete of {$id} is success',
            'data' => [],
        ];
    }
}
