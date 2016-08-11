<?php

namespace App\Http\Controllers\Admin;

use App\Article;

use App\ArticleContent;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Project;
use App\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ArticlesController extends AdminBaseController {

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
			'ukr'       => $article->content->where('lang_id', 2)->first(),
			'rus'       => $article->content->where('lang_id', 1)->first(),
		]);
	}

	public function create() {

		return view('admin.articles.create')->with([
			'submitButton' => 'Добавить',
		    'types' => Type::all(),
		    'projects' => Project::all(),
		    'activeType' => $this->defineActiveType()
		]);
	}

	public function store(ArticleCreateRequest $request) {
		if ($this->sluglIsValid($request->slug)) {
			$imageUploaded = $this->uploadImage($request);
			if (!$imageUploaded) {
				flash('Миниатюра новости должна біть картинкой', 'danger');

				return redirect()->back()->withInput();
			}

			$article = Article::create([
				'type_id'       => $request->type_id,
				'project_id'    => $request->project_id,
				'created_by'    => \Auth::user()->id,
				'published_at'  => $this->time($request->published_at),
				'slug'          => $request->slug,
				'image'         => $imageUploaded,
			]);

			$content = new ArticleContent();
			$messages = $content->updateOrCreateInstance($article, $request->all(), 'article_id', 'title', 'articles');
			$this->handleMessagesUpdate($messages);

			return redirect()->back()->withInput();

		} else {

			return redirect()->back()
			                 ->withInput()
			                 ->withErrors(['slug' => 'Статья с такой ссылкой уже существет!']);
		}

	}

	public function edit(Article $article) {

		return view('admin.articles.update')->with([
			'article'       => $article,
			'ukr'           => $article->content->where('lang_id', 2)->first(),
			'rus'           => $article->content->where('lang_id', 1)->first(),
			'types'         => Type::all(),
			'projects'      => Project::all(),
			'submitButton'  => 'Изменить',
		]);
	}

	public function update(ArticleRequest $request, Article $article) {
		if ($this->slugIsValidForUpdate($request->slug, $article->slug)) {
			$imageUploaded = $this->checkImage($request, $article);
			if (!$imageUploaded) {
				flash('Миниатюра новости должна біть картинкой', 'danger');

				return redirect()->back()->withInput();
			}

			$article->update([
				'type_id'       => $request->type_id,
				'project_id'    => $request->project_id,
				'created_by'    => \Auth::user()->id,
				'published_at'  => $this->time($request->published_at),
				'slug'          => $request->slug,
				'image'         => $imageUploaded,
			]);

			$content = new ArticleContent();
			$messages = $content->updateOrCreateInstance($article, $request->all(), 'article_id', 'title', 'articles');
			$this->handleMessagesUpdate($messages);

			return redirect()->route('edit_article', ['article' => $article->slug])->withInput();
		} else {

			return redirect()->back()
			                 ->withInput()
			                 ->withErrors(['slug' => 'Статья с такой ссылкой уже существет!']);
		}
	}

	public function delete(Article $article) {
		$article->content()->delete();
		$article->deleteImage();
		$article->delete();
		flash('Новость успешно удалена', 'success');

		return redirect()->route('admin_articles');
	}

	private function uploadImage($request) {
		$fileName = str_slug($request->image->getClientOriginalName()).'-'.time().'.'.$request->image->getClientOriginalExtension();
		$mime = File::mimeType($request->image);
		if ($mime == 'image/jpeg' || $mime == 'image/png' || $mime == 'image/gif') {
			$img = Image::make($request->image);
			$img->resize(null, 250, function($constraint){
				$constraint->aspectRatio();
			});
			$img->save(public_path('img/articles/').$fileName);

			return $img->basename;
		} else {

			return false;
		}
	}

	private function defineActiveType() {
		$route = \Route::currentRouteName();
		switch($route) {
			case 'create_article':
				return 'article';
				break;
			case 'create_story':
				return 'story';
				break;
			case 'create_event':
				return 'event';
				break;
			case 'create_challenge':
				return 'challenge';
				break;
			case 'create_grant':
				return 'grant';
				break;
			case 'create_project':
				return 'project';
				break;
		}
	}

	/**
	 * @param ArticleRequest    $request
	 * @param Article           $article
	 *
	 * @return bool
	 */
	private function checkImage($request, $article) {
		if (!is_null($request->image)) {
			$article->deleteImage();

			return $this->uploadImage($request);
		} else {

			return $article->image;
		}
	}

	/**
	 * Validate if email is valid for create from
	 *
	 * @param string $slug
	 *
	 * @return bool
	 */
	private function sluglIsValid($slug) {
		$slugs = Article::all()->pluck('slug')->toArray();
		if(in_array($slug, $slugs)) {

			return false;
		}

		return true;

	}

	/**
	 * Validate if email is valid for update form
	 *
	 * @param string $slug
	 * @param string $old_slug
	 *
	 * @return bool
	 */
	private function slugIsValidForUpdate($slug, $old_slug) {
		$slugs = Article::all()->pluck('slug')->toArray();
		if(in_array($slug, $slugs) && $slug != $old_slug) {

			return false;
		}

		return true;

	}

}
