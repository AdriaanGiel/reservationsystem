<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssignmentType
 * @package App
 */
class AssignmentType extends Model
{
    /**
     * Variable to set database table name
     * @var string
     */
    protected $table = 'assignment_type';

    /**
     * Method to get all assignment of this type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
