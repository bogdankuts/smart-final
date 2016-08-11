<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleContent;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticlesController extends BaseController {

	public function index() {

		return view('pages.articles')->with([
			'contents' => ArticleContent::selectArticlesByLanguage($this->getLangId())
		]);
	}

    public function show(Article $article) {

	    $article->views++;
	    $article->save();

	    $content = $article->contentByLang($this->getLangId());

	    if (!is_null($content)) {
		    return view('pages.article')->with([
			    'content' => $article->contentByLang($this->getLangId()),
		    ]);
	    } else {
		    abort(404);
	    }
    }

}
