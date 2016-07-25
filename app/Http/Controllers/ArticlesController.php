<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleContent;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticlesController extends BaseController {

	public function index(Article $article) {
		//return "This are all of the articles in $lang";
	}

    public function show(Article $article) {
	    dd($this->lang);
	    //dd($article->content());
    }

}
