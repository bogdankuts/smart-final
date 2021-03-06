<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

use App\Http\Requests;

class ProjectsController extends AdminBaseController {

	public function index() {

		return view('admin.projects.projects')->with([
			'projects'  => Project::with('field')->get(),
		    'fields'    => Field::all(),
		]);
	}

	public function show(Project $project) {

		return view('admin.projects.project')->with([
			'project'   => $project,
		    'articles'  => $project->getArticlesByProject($project->project_id),
		]);
	}

	public function create() {

		return view('admin.projects.create')->with([
			'submitButton'  => 'Добавить',
		    'fields'        => Field::all()

		]);
	}

	public function store(ProjectRequest $request) {

		Project::create($request->all());
		flash('Новый проект успешно создан', 'success');

		return redirect()->back();
	}

	public function edit(Project $project) {

		return view('admin.projects.update')->with([
			'project'       => $project,
			'submitButton'  => 'Изменить',
			'fields'        => Field::all()
		]);
	}

	public function update(ProjectRequest $request, Project $project) {

		$project->update($request->all());
		flash('Проект успешно обновлен', 'success');

		return redirect()->back();
	}

	public function delete(Project $project) {
		if ($project->project_id !== 1) {

			$project->setDefaultArticles();
			$project->delete();

			flash('Проект успешно удален', 'success');
		} else {
			flash('Проект по умолчанию не может быть удален', 'danger');
		}

		return redirect()->route('admin_projects');
	}
}
