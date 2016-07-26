<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests;


class CategoriesController extends AdminBaseController {
	//TODO::think about Success($instance) and a helper for that

	public function index() {

		return view('admin.categories.categories')->with([
			'categories'  => Category::orderBy('title', 'asc')->get(),
		]);
	}

	public function show(Category $category) {

		return view('admin.categories.category')->with([
			'category'      => $category,
		    'profiles'      => $category->getProfilesByCategory(),
		    'positions'     => $category->getPositionsByCategory()
		]);
	}

	public function create() {

		return view('admin.categories.create')->with([
			'submitButton'  => 'Добавить'
		]);
	}

	public function store(CategoryRequest $request) {

		Category::create($request->all());
		flash('Новая категория успешно создана', 'success');

		return redirect()->back();
	}

	public function edit(Category $category) {

		return view('admin.categories.update')->with([
			'category'       => $category,
			'submitButton'  => 'Изменить',
		]);
	}

	public function update(CategoryRequest $request, Category $category) {

		$category->update($request->all());
		flash('Категория успешно обновлена', 'success');

		return redirect()->back();
	}

	public function delete(Category $category) {
		if ($category->category_id !== 1) {
			$category->deleteCategory();
			flash('Категория успешно удалена', 'success');
		} else {
			flash('Категория по умолчанию не можеть быть удалена', 'danger');
		}

		return redirect()->route('admin_categories');
	}

}
