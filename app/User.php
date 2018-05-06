<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App
 */
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
    ];

    /**
     * @var array
     */
    protected $with = ['profile'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function examined_approved()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'approved');
            })
            ->get();
    }

    /**
     * @return $this
     */
    public function makeAdmin()
    {
        $this->role_id = 2;
        $this->save();

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function examined_wrong()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'rejected');
            })
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function examined()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function no_examination()
    {
        return $this->assignments()
            ->with(['company:id,name','user:id,name','type:id,name','status:id,name'])
            ->whereHas('status', function ($query) {
                $query->where('name', 'pending');
            })
            ->get();
    }

    /**
     * @return mixed
     */
    public static function workers()
    {
        return self::where('role_id', 1)->get();
    }

    /**
     * @return mixed
     */
    public static function workersQuery()
    {
        return self::where('role_id', 1);
    }

    /**
     * @return mixed
     */
    public static function adminsQuery()
    {
        return self::where('role_id',2);
    }

    /**
     * @return mixed
     */
    public static function admins()
    {
        return self::where('role_id',2)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->id == 2;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
