<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ArticleContent extends AdminBaseModel {
	protected $table = 'articles_contents';
	public $timestamps = false;
	protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'article_id', 'body', 'preview_text', 'image', 'lang_id', 'title'];




	public function article() {
		return $this->belongsTo('App\Article', 'article_id', 'article_id');
	}

	/**
	 * Fields to check and store
	 * @var array
	 */
	protected $fields = ['meta_title', 'meta_description', 'meta_keywords', 'title', 'body', 'preview_text', 'image', 'lang_id'];

	public static function selectArticlesByLanguage($lang_id) {
		$content = ArticleContent::where('lang_id', $lang_id)->paginate(9);

		return $content;
	}

	/**
	 * Get all articles by type
	 *
	 * @param int $lang_id
	 * @param int $type_id
	 *
	 * @return array
	 */
	public static function selectArticlesByType($lang_id, $type_id) {
		$articles = Article::published()->where('type_id', $type_id)->get();
		if(!$articles->isEmpty()) {
			foreach($articles as $article) {
				$content[] = $article->content()->where('lang_id', $lang_id)->paginate(9);
			}
		} else {
			$content = [];
		}

		return $content;
	}

	public static function selectArticlesByProject($lang_id, $project_id) {
		$articles = Article::published()
							->where('type_id', 5)
							->where('project_id', $project_id)
							->get();
		if(!$articles->isEmpty()) {
			foreach($articles as $article) {
				$content[] = $article->content()->where('lang_id', $lang_id)->paginate(9);
			}
		} else {
			$content = [];
		}

		return $content;
	}
}
