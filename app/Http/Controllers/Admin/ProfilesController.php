<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Profile;
use App\ProfileContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;

class ProfilesController extends AdminBaseController {

	public function index() {

		return view('admin.profiles.profiles')->with([
			'profiles' => Profile::orderBy('created_at', 'desc')->get(),
		]);
	}

	public function show(Profile $profile) {

		return view('admin.profiles.profile')->with([
			'profile' => $profile,
		]);
	}

	public function create() {

		return view('admin.profiles.create')->with([
			'submitButton'  => 'Добавить',
		    'categories'    => Category::where('category_id', '>', '1')->get()
		]);
	}

	public function store(ProfileRequest $request) {
		$profile = Profile::create([
			'category_id' => $request->category_id,
		    'created_by' => \Auth::user()->id,
		    'published_at' => $this->time($request->published_at)
		]);

		$content = new ProfileContent();
		$messages = $content->store($profile->profile_id, $request->all());
		$this->handleMessages($messages);

		return redirect()->back()->withInput();
	}

	public function edit(Profile $profile) {

		return view('admin.profiles.update')->with([
			'profile'       => $profile,
			'ukr'           => $profile->content->where('lang_id', 2)->first(),
			'rus'           => $profile->content->where('lang_id', 1)->first(),
			'submitButton'  => 'Изменить',
			'categories'    => Category::where('category_id', '>', '1')->get()
		]);
	}

	public function update(ProfileRequest $request, Profile $profile) {

		$profile->update([
			'category_id' => $request->category_id,
			'published_at' => $this->time($request->published_at)
		]);

		$content = new ProfileContent();
		$messages = $content->updateContent($profile->profile_id, $request->all());
		$this->handleMessagesUpdate($messages);

		return redirect()->back();
	}

	public function delete(Profile $profile) {

		$profile->content()->delete();
		$profile->delete();
		flash('Профайл успешно удален', 'success');

		return redirect()->route('admin_profiles');
	}

	/**
	 * Flash correct message depending on action
	 *
	 * @param array $messages
	 */
	private function handleMessages($messages) {
		if (array_key_exists('success', $messages)) {
			if (count($messages['success']) == 1) {
				flash('Версия для языка '.$messages['success'][0].' успешно добавлена, но версия для языка '.$messages['fail'][0].' не добавлена');
			} else {
				flash('Версии для языков '.$messages['success'][0].' и '.$messages['success'][1].' успешно добавлены', 'success');
			}
		} else {
			flash('Версии для языков '.$messages['fail'][0].' и '.$messages['fail'][1].' не добавлены, так как остутвует файл или имя', 'danger');
		}
	}

	/**
	 * Flash correct message depending on action
	 *
	 * @param array $messages
	 */
	private function handleMessagesUpdate($messages) {
		if (array_key_exists('success', $messages)) {
			if (count($messages['success']) == 1) {
				flash('Версия для языка '.$messages['success'][0].' успешно обновлена, но версия для языка '.$messages['fail'][0].' не обновлена');
			} else {
				flash('Версии для языков '.$messages['success'][0].' и '.$messages['success'][1].' успешно обновлены', 'success');
			}
		} else {
			flash('Версии для языков '.$messages['fail'][0].' и '.$messages['fail'][1].' не обновлены, так как остутвует файл или имя', 'danger');
		}
	}

	/**
	 * Format time to be a carbon object
	 * @param string $time
	 *
	 * @return Carbon
	 */
	private function time($time) {

		return Carbon::createFromFormat('d.m.Y H:i', $time);
	}
}
