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

Route::get('/', 'IndexController@index');

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

//  Morning Workout - ELOQUENT 21-10-2019
Route::post('/api/collection', 'Api\CollectionController@store');
Route::get('/api/collection/user', 'Api\CollectionController@user_lists');  //  FAIL FAIL FAIL FAIL

Route::get('/test/form', 'ApiController@form');
Route::post('/test/form', 'ApiController@handleForm');

//  React form posting
Route::get('/api/eloquentmovie', 'Api\MovieControllerEloquent@index');
Route::post('/api/eloquentmovie/update', 'Api\MovieControllerEloquent@update');

//  Morning Workout - FAVORITE MOVIES 21-10-2019
Route::post('/api/movies/favorite/toggle', 'Api\FavoriteMovieController@toggle');
Route::get('/api/movies/favorite', 'Api\FavoriteMovieController@status');







//  SLAVOR LARAVEL LESSONS - 24-10-2019 _TO_ 25-10-2019
Route::get('/movies', 'NewMovieController@index');
Route::get('/movies/{id}', 'NewMovieController@show');
//  for href="{{    route(route name)   }}, you should name routes above like
//  Route::get('/movies', 'NewMovieController@index')->('route_name');
Route::get('/movies/{movie}/reviews', 'ReviewController@index');
Route::get('/movies/{movie}/reviews/create', 'ReviewController@create')->middleware('auth');
Route::post('/movies/{movie}/reviews/create', 'ReviewController@store')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('new-person', 'NewPersonController');

//  API authentication & passport
Route::get('/api_login', 'ApiLoginController@index');

//  Passport controller
Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('/management', 'ManagementController@index');
});
