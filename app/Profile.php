<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'profile_picture',
        'hours',
        'user_id'
    ];
}
