<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Profile extends Model {
	protected $dates=['created_at', 'updated_at', 'published_at'];
	protected $primaryKey = 'profile_id';
	protected $fillable = ['category_id', 'created_by', 'published_at'];

	public function content() {

		return $this->hasMany('App\ProfileContent', 'profile_id', 'profile_id');
	}

	/**
	 * Return author of profile
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\User', 'created_by', 'id');
	}

	public static function getAllProfiles() {

		return  Profile::orderBy('created_at', 'desc')->get();
	}

	public function deleteFile() {
		$contents = $this->content;

		foreach ($contents as $content) {
			File::delete(public_path('files/profiles/'.$content->file));
		}
	}
}
