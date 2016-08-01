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

	public function positions() {

		return $this->hasMany('App\Position', 'created_by', 'id');
	}

	public function profiles() {

		return $this->hasMany('App\Profile', 'created_by', 'id');
	}

	public function articles() {

		return $this->hasMany('App\Article', 'created_by', 'id');
	}

}

