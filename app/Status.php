<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function standardStatuses()
    {
        return static::where('type',NULL)->get();
    }

    public static function companyStatuses()
    {
        return static::where('type','company')->get();
    }
}
