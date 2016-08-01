<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProfileCreateRequest;
use App\Profile;
use App\ProfileContent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends AdminBaseController {

	public function index() {
		if (Auth::user()->master) {
			$profiles = Profile::getAllProfiles();
		} else {
			$profiles = User::find(Auth::user()->id)->profiles;
		}

		return view('admin.profiles.profiles')->with([
			'profiles' => $profiles,
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

	public function store(ProfileCreateRequest $request) {
		$profile = Profile::create([
			'category_id' => $request->category_id,
		    'created_by' => \Auth::user()->id,
		    'published_at' => $this->time($request->published_at)
		]);

		$content = new ProfileContent();
		$messages = $content->updateOrCreateInstance($profile, $request->all(), 'profile_id', 'name', 'profiles');
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
		$messages = $content->updateOrCreateInstance($profile, $request->all(), 'profile_id', 'name', 'profiles');
		$this->handleMessagesUpdate($messages);

		return redirect()->back();
	}

	public function delete(Profile $profile) {

		$profile->content()->delete();
		$profile->delete();
		flash('Профайл успешно удален', 'success');

		return redirect()->route('admin_profiles');
	}
}
