<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public $timestamps = false;

	protected $primaryKey = 'category_id';

	protected $fillable = ['title_ua', 'title_ru'];

	protected $defaultCategory = 1;


	/**
	 * Get all positions inside category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function positions() {

		return $this->hasMany('App\Position', 'category_id', 'category_id');
	}

	/**
	 * Get all profiles inside category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function profiles() {

		return $this->hasMany('App\Profile', 'category_id', 'category_id');
	}

	/**
	 * Deletes category and updates Positions ans Profiles to default value
	 *
	 * @throws \Exception
	 */
	public function deleteCategory() {
		$this->updatePositionsOnDelete();
		$this->updateProfilesOnDelete();
		$this->delete();
	}

	public function getProfilesByCategory() {
		$profiles = new Profile();

		return $profiles->with('content')->where('category_id', $this->category_id)->get();
	}

	public function getPositionsByCategory() {
		$positions = new Position();

		return $positions->with('content')->where('category_id', $this->category_id)->get();
	}

	/**
	 * Updates positions on category->delete
	 */
	private function updatePositionsOnDelete() {
		foreach ($this->positions as $position) {
			$position->category_id = $this->defaultCategory;
			$position->save();
		}
	}

	/**
	 * Updates profiles on category->delete
	 */
	private function updateProfilesOnDelete() {
		foreach ($this->profiles as $profile) {
			$profile->category_id = $this->defaultCategory;
			$profile->save();
		}

	}

}
