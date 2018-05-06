<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App
 */
class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phonenumber',
        'profile_picture',
        'hours',
    ];


    /**
     * Method to get user full name
     * @return string
     */
    public function fullName()
    {
        return "{$this->firstname} {$this->lastname}";
    }

}
