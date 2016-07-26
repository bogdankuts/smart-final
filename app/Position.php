<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

	protected $dates = ['created_at', 'updated_at', 'published_at'];

	protected $primaryKey = 'position_id';

	//TODO::think about slug instead of id

	public function content() {

		return $this->hasMany('App\PositionContent', 'position_id', 'position_id');
	}

	/**
	 * Return author of position
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\User', 'created_by', 'id');
	}
}
