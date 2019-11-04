<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //  Below is if the MODEL-name differs from the actual name in the database...not essential if Laravel conventions are used
    //  protected $table = 'persons';

    public $timestamps = false;

    //  Whitelist of columns
    protected $fillable = [
        'name',
        'photo_url',
        'biography',
        'profession_id'
    ];

    //  Specify what ISN't mass-assignable, and what user is not able to manually fill in
    //  If it is empty, then all fields will be on the whitelist :D (*Possible security breach)
    protected $guarded = [];
}
