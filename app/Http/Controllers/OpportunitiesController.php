<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleContent;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;

class OpportunitiesController extends Controller {

	public function index($type) {
		$articles = ArticleContent::selectArticlesByType($this->getLangId(), $this->resolveType($type));

		return view('pages.opportunities')->with([
			'articles'  => $articles,
		    'type'      => $type,
		]);
	}

	private function resolveType($type) {

		$type = Type::where('type', $type)->first();

		if (!is_null($type)) {

			return $type->type_id;
		} else {

			flash('Haha, very funny', 'info');
			return 2;
		}
	}
}
