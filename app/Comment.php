<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'description',
        'user_id'
    ];
}
