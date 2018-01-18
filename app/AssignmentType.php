<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentType extends Model
{
    protected $table = 'assignment_type';
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
