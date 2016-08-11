<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Position extends Model {

	protected $dates = ['created_at', 'updated_at', 'published_at'];

	protected $primaryKey = 'position_id';

	protected $fillable = ['category_id', 'created_by', 'published_at'];

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

	public static function getAllPositions() {

		return Position::orderBy('created_at', 'desc')->get();
	}

	public function deleteFile() {
		$contents = $this->content;

		foreach ($contents as $content) {
			File::delete(public_path('files/positions/'.$content->file));
		}
	}
}
