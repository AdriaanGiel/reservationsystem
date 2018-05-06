<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App
 */
class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return mixed
     */
    public static function standardStatuses()
    {
        return static::where('type',NULL)->get();
    }

    /**
     * @return mixed
     */
    public static function companyStatuses()
    {
        return static::where('type','company')->get();
    }
}
