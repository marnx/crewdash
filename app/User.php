<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * This collums you can add vallues for register form.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname','dob','vessel', 'employeenumber', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        foreach ($this->roles as $currentRole)
        {
            if ($currentRole->name == $role){
                return true;
            }
        }
        return false;
    }
    public function isAdmin()
    {
        return $this->roles()->where('role_id', 1)->first();
    }
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("firstname", "LIKE","%$keyword%")
                    ->orWhere("surname", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("vessel", "LIKE", "%$keyword%")
                    ->orWhere("employeenumber", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
