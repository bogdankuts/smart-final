<?php

namespace App\Http\Controllers;

use App\ArticleContent;
use App\Category;
use App\Position;
use App\PositionContent;
use App\Profile;
use App\ProfileContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AboutProjectController extends Controller {

	public function index($type) {

		$profilesIds =[];
		$profiles = [];
		$profilesAll = ProfileContent::where('lang_id', $this->getLangId())->get();

		foreach ($profilesAll as $profile) {
			if ($profile->profile->published_at <= Carbon::now()) {
				 $profiles[] = $profile;
				$profilesIds[] = $profile->profile->category_id;
			}
		}
		$profiles = collect($profiles);
		$categoriesProfiles = Category::find($profilesIds);

		$positionsIds = [];
		$positions = [];
		$positionsAll = PositionContent::where('lang_id', $this->getLangId())->get();
		foreach ($positionsAll as $position) {
			if ($position->position->published_at <= Carbon::now()) {
				$positions[] = $position;
				$positionsIds[] = $position->position->category_id;
			}
		}
		$positions = collect($positions);
		$categoriesPositions = Category::find($positionsIds);


		$stories = ArticleContent::selectArticlesByType($this->getLangId(), 6);

		return view('pages.about_project')->with([
			'type' => $type,
		    'profiles' => $profiles,
		    'positions' => $positions,
		    'categoriesProfiles' => $categoriesProfiles,
		    'categoriesPositions' => $categoriesPositions,
		    'stories' => $stories
		]);
	}

	public function incrementViewsProfile(Profile $profile) {
		$profile->views++;
		$profile->save();
	}

	public function incrementViewsPosition(Position $position) {
		$position->views++;
		$position->save();
	}

}
