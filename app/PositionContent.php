<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionContent extends AdminBaseModel {
	protected $table = 'positions_contents';
	public $timestamps = false;
	protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'title', 'file', 'description', 'lang_id', 'position_id'];


	/**
	 * Fields to check and store
	 * @var array
	 */
	protected $fields = ['meta_title', 'meta_description', 'meta_keywords', 'title', 'description', 'file', 'lang_id'];

	public function position() {

		return $this->belongsTo('App\Position', 'position_id', 'position_id');
	}

}
