<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//  Added on 3-11-2019, attempt to authenticate through API
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens /* ESSENTIAL */, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function collections()
    {
        return $this->hasMany('App\Collection');
    }

    //  MORNING WORKOUT - LARAVEL/REACT MOVIES

    public function favorite_movies()
    {
        return $this->belongsToMany('App\Movie', 'favorite_movies');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
