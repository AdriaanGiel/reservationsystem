<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'phonenumber',
        'profile_picture',
        'hours',
    ];


    public function fullName()
    {
        return "{$this->firstname} {$this->lastname}";
    }

}
