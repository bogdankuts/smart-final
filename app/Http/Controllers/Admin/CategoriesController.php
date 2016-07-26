<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests;


class CategoriesController extends AdminBaseController {
	//TODO::check redirect with error, maybe it's absolute nonsense

	public function index() {

		return view('admin.categories.categories')->with([
			'categories'  => Category::where('category_id','>',1)->orderBy('title', 'asc')->get(),
		]);
	}

	public function create() {

		return view('admin.categories.create')->with([
			'submitButton'  => 'Добавить'
		]);
	}

	public function store(CategoryRequest $request) {

		if (Category::create($request->all())) {
			flash('Новая категория успешно создана', 'success');

			return redirect()->back();
		} else {

			return $this->redirectWithError();
		}
	}

	public function edit(Category $category) {

		return view('admin.categories.update')->with([
			'category'       => $category,
			'submitButton'  => 'Изменить',
		]);
	}

	public function update(CategoryRequest $request, Category $category) {

		if ($category->update($request->all())) {
			flash('Категория успешно обновлена', 'success');

			return redirect()->back();
		} else {

			return $this->redirectWithError();
		}
	}

	public function delete(Category $category) {

		if ($category->delete()) {
			flash('Категория успешно удалена', 'success');

			return redirect()->route('admin_categories');
		} else {

			return $this->redirectWithError();
		}
	}

}
