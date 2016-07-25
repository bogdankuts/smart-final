<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $dates=['created_at', 'updated_at', 'published_at'];

	protected $primaryKey = 'profile_id';


	public function content() {

		return $this->hasOne('App\ProfileContent', 'profile_id', 'profile_id');
	}
}
