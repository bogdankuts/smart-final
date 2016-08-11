<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileContent extends AdminBaseModel {
	protected $table = 'profiles_contents';
	public $timestamps = false;
	protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'name', 'file', 'description', 'lang_id', 'profile_id'];

	/**
	 * Fields to check and store
	 * @var array
	 */
	protected $fields = ['meta_title', 'meta_description', 'meta_keywords', 'name', 'description', 'file', 'lang_id'];


	public function category() {

		return $this->hasOneT('App\Category', 'category_id', 'category_id');
	}

	public function profile() {

		return $this->belongsTo('App\Profile', 'profile_id', 'profile_id');
	}

}
