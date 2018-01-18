<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use  Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $with = ['profile'];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function examined_approved()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'approved');
            })
            ->get();
    }

    public function examined_wrong()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'rejected');
            })
            ->get();
    }

    public function examined()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->get();
    }

    public function no_examination()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'pending');
            })
            ->get();
    }

    public static function workers()
    {
        return self::where('role_id', 1)->get();
    }

    public static function workersQuery()
    {
        return self::where('role_id', 1);
    }

    public static function adminsQuery()
    {
        return self::where('role_id',2);
    }

    public static function admins()
    {
        return self::where('role_id',2)->get();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role->id == 2;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
