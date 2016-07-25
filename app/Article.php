<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = ['created_by', 'type_id', 'slug', 'project_id', 'published_at'];

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


	/**
	 * Return author of article
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\User', 'created_by', 'id');
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

		return $this->with('content')
			           ->with('user')
			           ->where('type_id', 1)
			           ->groupBy('article_id')
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

		return $this->with('content')
			->with('user')
			->where('type_id', 1)
			->where('created_by',$userId)
			->groupBy('article_id')
			->orderBy('published_at', 'desc')
		    ->get();
	}
}
