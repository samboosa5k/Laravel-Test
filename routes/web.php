<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//  MOVIE API
Route::get('/api', 'ApiController@index');
Route::get('/api/search/people', 'ApiController@search_people');
Route::get('/api/cast_crew', 'ApiController@cast_and_crew');
Route::get('/api/movies', 'MovieController@movies');
Route::get('/api/movies/list', 'MovieController@index');
Route::get('/api/movies/cc', 'MovieController@cast_and_crew');

//  REVIEWS
Route::get('/api/movies/reviews', 'Api\ReviewController@index');
Route::post('/api/movies/reviews', 'Api\ReviewController@store');

//  RATINGS
Route::get('/api/ratings', 'Api\RatingController@index');
Route::post('/api/ratings', 'Api\RatingController@store');
Route::put('/api/ratings', 'Api\RatingController@update');
Route::delete('/api/ratings', 'Api\RatingController@destroy');

//  Morning Workout
Route::get('/api/morningWorkout/', 'MorningWorkoutController@movies');
Route::get('/api/morningWorkoutSingleMovie/', 'MorningWorkoutControllerSingleMovie@movie');
//  End

Route::get('/test/form', 'ApiController@form');
Route::post('/test/form', 'ApiController@handleForm');
