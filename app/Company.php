<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'street',
        'number',
        'insertion',
        'zipcode',
        'place_id',
    ];

    public function place()
    {
        return $this->hasOne(Place::class);
    }



}
