<?php

namespace App\Http\Controllers\Admin;

use App\Article;

use App\ArticleContent;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Type;
use Carbon\Carbon;

class ArticlesController extends Controller {

	public function index(Article $article) {
		if (\Auth::user()->master) {
			$articles = $article->selectAllArticles();
		} else {
			$articles = $article->selectAllArticlesByUser(\Auth::user()->id);
		}

		return view('admin.articles.articles')->with([
			'articles'  => $articles,
		]);
	}

	public function show(Article $article) {

		return view('admin.articles.article')->with([
			'article'   => $article,
		]);
	}

	public function create() {

		return view('admin.articles.create')->with([
			'submitButton' => 'Добавить',
		    'types' => Type::all(),
		    'projects' => Project::all()
		]);

	}

	public function edit() {

		return view('a');
	}
	public function update() {
		dd('Update request');
	}

}
