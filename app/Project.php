<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	protected $primaryKey = 'project_id';

	protected $fillable = ['title_ua', 'title_ru', 'field_id'];


	/**
	 * Get the field for the project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function field() {

		return $this->belongsTo('App\Field', 'field_id', 'field_id');
	}

	/**
	 * Get all articles with the project id
	 *
	 * @param integer $projectId
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getArticlesByProject($projectId) {
		$article = new Article();

		return $article->with('content')->where('project_id', $projectId)->get();

	}
}
