<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'date',
        'hours',
        'start_time',
        'description',
        'user_id',
        'company_id',
        'status_id',
        'assignment_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function type()
    {
        return $this->belongsTo(AssignmentType::class,'assignment_type_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function judge(bool $judgement)
    {
        return $this->update([
           'status_id' => ($judgement) ? 2 : 3
        ]);
    }

}
