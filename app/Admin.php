<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Admin extends Model {
	use PresentableTrait;

    protected $table = 'users';

	protected $dates = ['created_at', 'updated_at', 'last_visit'];

	protected $fillable = ['name', 'email', 'password', 'master', 'last_visit'];

	protected $hidden = ['password', 'remember_token'];

	protected $presenter = 'App\Http\Presenters\AdminPresenter';

	/**
	 * The id of the default admin for all entities
	 *
	 * @var string
	 */
	protected $defaultAdminId = '1';

	/**
	 * Update the last visit Carbon
	 *
	 * @return bool
	 */
	public function updateLastVisit() {
		$user = \Auth::user();
		$user->last_visit = Carbon::now();

		return $user->save();
	}

	/**
	 * Return all articles by user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles() {

		return $this->hasMany('App\Article', 'created_by');
	}

	/**
	 * Return all profiles by user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function profiles() {

		return $this->hasMany('App\Profile', 'created_by');
	}

	/**
	 * Return all positions by user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function positions() {

		return $this->hasMany('App\Position', 'created_by');
	}


	/**
	 * Updates article->created_by before the real admin is deleted
	 */
	public function updateArticlesOnDelete() {
		foreach($this->articles as $article) {
			$article->created_by = $this->defaultAdminId;
			$article->save();
		}
	}

	/**
	 * Updates profile->created_by before the real admin is deleted
	 */
	public function updateProfilesOnDelete() {
		foreach($this->profiles as $profile) {
			$profile->created_by = $this->defaultAdminId;
			$profile->save();
		}
	}

	/**
	 * Updates positions->created_by before the real admin is deleted
	 */
	public function updatePositionsOnDelete() {
		foreach($this->positions as $position) {
			$position->created_by = $this->defaultAdminId;
			$position->save();
		}
	}







}
