<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PositionCreateRequest;
use App\Http\Requests\PositionRequest;
use App\Position;
use App\PositionContent;
use App\ProfileContent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class PositionsController extends AdminBaseController {
	public function index() {
		if (Auth::user()->master) {
			$positions = Position::getAllPositions();
		} else {
			$positions = User::find(Auth::user()->id)->positions;
		}

		return view('admin.positions.positions')->with([
			'positions' => $positions,
		]);
	}

	public function show(Position $position) {

		return view('admin.positions.position')->with([
			'position' => $position,
		]);
	}

	public function create() {

		return view('admin.positions.create')->with([
			'submitButton'  => 'Добавить',
			'categories'    => Category::where('category_id', '>', '1')->get()
		]);
	}

	public function store(PositionCreateRequest $request) {
		$position = Position::create([
			'category_id' => $request->category_id,
			'created_by' => \Auth::user()->id,
			'published_at' => $this->time($request->published_at)
		]);

		$content = new PositionContent();
		$messages = $content->updateOrCreateInstance($position, $request->all(), 'position_id', 'title', 'positions');
		$this->handleMessages($messages);

		return redirect()->back()->withInput();
	}

	public function edit(Position $position) {

		return view('admin.positions.update')->with([
			'position'      => $position,
			'ukr'           => $position->content->where('lang_id', 2)->first(),
			'rus'           => $position->content->where('lang_id', 1)->first(),
			'submitButton'  => 'Изменить',
			'categories'    => Category::where('category_id', '>', '1')->get()
		]);
	}

	public function update(PositionRequest $request, Position $position) {
		$position->update([
			'category_id' => $request->category_id,
			'published_at' => $this->time($request->published_at)
		]);

		$content = new PositionContent();
		$messages = $content->updateOrCreateInstance($position, $request->all(), 'position_id', 'title', 'positions');
		$this->handleMessagesUpdate($messages);

		return redirect()->back();
	}

	public function delete(Position $position) {

		$position->content()->delete();
		$position->delete();
		flash('Профайл успешно удален', 'success');

		return redirect()->route('admin_positions');
	}
}
