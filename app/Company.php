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
        'city',
        'status_id',
        'company_status_id'
    ];

    protected $with = ['companyStatus'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function companyStatus()
    {
        return $this->belongsTo(Status::class,'company_status_id');
    }

    public static function active()
    {
        return self::with('status')
            ->whereHas('status', function ($query) {
                $query->where('name', '!=', 'rounded');
            })
            ->get();
    }

    public static function withStatus($status)
    {
        return self::with('status')
            ->whereHas('status', function ($query) use ($status) {
                $query->where('name', $status);
            })
            ->get();
    }

    public function approve()
    {
        $status = Status::where('name','approved')->first();
        return $this->update([
           'status_id' => $status->id
        ]);
    }


}
