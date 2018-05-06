<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App
 */
class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'street',
        'number',
        'insertion',
        'zipcode',
        'city',
        'status_id',
        'company_status_id'
    ];

    /**
     * When getting data from database, these values wil also be retrieved
     * @var array
     */
    protected $with = ['companyStatus'];

    /**
     * Method to get company status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Method to get company status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function companyStatus()
    {
        return $this->belongsTo(Status::class,'company_status_id');
    }

    /**
     * Method to get companies that are in a active process
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function active()
    {
        return self::with('status')
            ->whereHas('status', function ($query) {
                $query->where('name', '!=', 'rounded');
            })
            ->get();
    }

    /**
     * Method to get all companies with a specific status
     * @param $status
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function withStatus($status)
    {
        return self::with('status')
            ->whereHas('status', function ($query) use ($status) {
                $query->where('name', $status);
            })
            ->get();
    }

    /**
     * Method to approve company
     * @return bool
     */
    public function approve()
    {
        $status = Status::where('name','approved')->first();
        return $this->update([
           'status_id' => $status->id
        ]);
    }


}
