<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

	protected $dates = ['created_at', 'updated_at', 'published_at'];

	protected $primaryKey = 'position_id';

	public function content() {

		return $this->hasOne('App\PositionContent', 'position_id', 'position_id');
	}
}
