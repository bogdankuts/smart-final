<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	protected $primaryKey = 'project_id';

	protected $fillable = ['title', 'field_id'];


	public function field() {

		return $this->belongsTo('App\Field', 'field_id', 'field_id');
	}

	public function getArticlesByProject($id) {
		$article = new Article();

		return $article->with('content')->where('project_id', $id)->get();

	}
}
