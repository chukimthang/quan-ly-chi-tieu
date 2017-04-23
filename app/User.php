<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Expense;
use App\Activity;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeGetAdmin($query)
    {
        return $query->where('is_admin', 1)->first();
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
