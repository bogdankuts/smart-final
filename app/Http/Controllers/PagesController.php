<?php

namespace App\Http\Controllers;

use App\Article;
use App\Field;
use App\Subscriber;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller {

	public function index() {
		//TODO::check this one more time
		$lang_id = $this->getLangId();
		$articles = Article::published()->orderBy('created_at', 'asc')->get();
		foreach($articles as $article) {
			$articleFinal = $article;
			$content = $article->content->where('lang_id', $lang_id)->first();
			if($content) {
				break;
			}
		}

		return view('pages.index')->with([
			'lastArticleSlug'           => $articleFinal->slug,
		    'lastArticleTitle'          => $content->title,
		    'lastArticleDescription'    => $content->preview_text,
		    'fields'                    =>Field::all(),
		]);
	}

	public function subscribe(Request $request) {
		$result = Subscriber::createCorrectSubscriber($request->email);

		if ($result) {
			flash(trans('messages.subscribe_success'), 'success');
		} else {
			flash(trans('messages.subscribe_fail'), 'danger');
		}

		return redirect()->back();

	}

	public function contacts() {

		return view('pages.contacts');
	}

	public function donate() {

		return view('pages.donate');
	}
}
