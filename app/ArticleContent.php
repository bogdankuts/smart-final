<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model {
	protected $table = 'articles_contents';
	public $timestamps = false;



	public function article() {
		return $this->belongsTo('App\Article', 'article_id', 'article_id');
	}

    //public function index() {
	 //   dd($this->all());
    //}
}
