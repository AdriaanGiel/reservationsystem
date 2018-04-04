<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class highscore extends Model
{
    protected $fillable = [
        'username',
        'points',
    ];
}
