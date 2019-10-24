<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
