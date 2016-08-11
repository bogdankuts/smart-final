<?php

namespace App\Http\Controllers;

use App\ArticleContent;
use App\Field;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectsController extends Controller {

	public function index($field) {

		//dd(Project::where('field_id', $field)->where('project_id', '>', 1)->get());

		return view('pages.projects')->with([
			'fields' => Field::all(),
		    'currentField' => $field,
		    'projects' => Project::where('field_id', $field)
			                       ->where('project_id', '>', 1)
			                       ->get()
		]);
	}

	public function show($field, Project $project) {
		$articles = ArticleContent::selectArticlesByProject($this->getLangId(), $project->project_id);

		return view('pages.project')->with([
			'fields' => Field::all(),
			'articles' => $articles,
			'currentField' => $field,
		    'project' => $project
		]);

	}
}
