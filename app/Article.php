<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Article extends Model {

	protected $fillable = ['created_by', 'type_id', 'slug', 'project_id', 'published_at', 'image'];

	protected $dates=['created_at', 'updated_at', 'published_at'];

	protected $primaryKey = 'article_id';

	public function getRouteKeyName() {
		return 'slug';
	}

	/**
	 * Return content for article
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function content() {

		return $this->hasMany('App\ArticleContent', 'article_id', 'article_id');
	}

	public function contentByLang($lang_id) {

		return $this->content->where('lang_id', $lang_id)->first();
	}


	/**
	 * Return author of article
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\User', 'created_by', 'id');
	}

	/**
	 * Get type name for list
	 *
	 * @return string
	 */
	public function getType() {
		$type = $this->type_id;
		switch($type) {
			case '1':
				return 'Новость';
				break;
			case '2':
				return 'Событие';
				break;
			case '3':
				return 'Конкурс';
				break;
			case '4':
				return 'Грант';
				break;
			case '5':
				return 'Проект';
				break;
			case '6':
				return 'История успеха';
				break;

		}
	}

	/**
	 * Return only published articles
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopePublished($query) {

		return $query->where('published_at', '<' , Carbon::now());
	}


	/**
	 * Get all articles for admin panel
	 *
	 * @return Article
	 */
	public function selectAllArticles() {

		return $this->groupBy('article_id')
			           ->orderBy('published_at', 'desc')
			           ->get();
	}

	/**
	 * Get all articles for admin panel depending on user
	 *
	 * @param string $userId
	 *
	 * @return Article
	 */
	public function selectAllArticlesByUser($userId) {

		return User::find($userId)->articles()
			->groupBy('article_id')
			->orderBy('published_at', 'desc')
		    ->get();
	}

	/**
	 * Delete article image on delete article
	 */
	public function deleteImage() {
		File::delete(public_path('img/articles/').$this->image);
	}

	/**
	 * Get project title of article
	 *
	 * @return string
	 */
	public function getProject() {
		$project = Project::where('project_id', $this->project_id)->first();
		if (!is_null($project)) {
			return $project->title_ua;
		}

		return '';
	}

	public function selectByType($lang_id, $type) {
		$articles = \DB::table('articles')
			->join('types', 'articles.type_id', '=', 'types.type_id')
			->where('type', $type)
			->join('articles_contents', 'articles.article_id', '=', 'articles_contents.article_id')
			->where('lang_id', $lang_id)
			->paginate(9);

		return $articles;
	}

}
