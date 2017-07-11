<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){

        return $this->hasOne('App\Post'); // by default looks for user_id in the DB

    }


    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function roles(){

        return $this->belongsToMany('App\Role')->withPivot('created_at'); // default table name is role_user

        // How to set up a custom table name, and join on table IDs
        //return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        
    }

}
