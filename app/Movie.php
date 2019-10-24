<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;

    public function reviews()
    {
        return $this->hasMany('App\Review', 'movie_id', 'id');
        // movie_id = foreign key, id = local key
        // Column specified incase database columns don't match Laravel conventions
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function favored_by_users()
    {
        return $this->belongsToMany('App\User', 'favorite_movies');
    }
}
