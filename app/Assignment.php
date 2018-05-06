<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assignment
 * @package App
 */
class Assignment extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
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

    /**
     * Method to get assignment user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Method to get assignment company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Method to get assignment type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(AssignmentType::class,'assignment_type_id');
    }

    /**
     * Method to get assignment status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Method to judge assignment
     * @param bool $judgement
     * @return bool
     */
    public function judge(bool $judgement)
    {
        return $this->update([
           'status_id' => ($judgement) ? 2 : 3
        ]);
    }

    /**
     * Method to get assignment by type
     * @param $type
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getByType($type)
    {
        $status = Status::where('name',$type)->first();
        return static::with(['company','user'])->where('status_id',$status->id)->orderBy('date')->get();
    }

}
