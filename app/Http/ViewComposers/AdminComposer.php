<?php
/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 13.07.16
 * Time: 10:51
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;


class AdminComposer {

	/**
	 * Env variable, used for navigation and other purposes
	 *
	 * @var string
	 */
	protected $env = '';

	/**
	 * Title variable used for header in admin panel
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * Define environment parameters - $env and $pageTitle for admin pages
	 *
	 */
	private function defineEnvParameters() {
		$route = \Route::currentRouteName();

		switch($route) {
			case 'dashboard':
				$this->title = 'Dashboard';
				$this->env = 'dashboard';
				break;
			case 'admins':
				$this->title = 'Администраторы';
				$this->env = 'admins';
				break;
			case 'admin':
				$this->title = 'Администратор';
				$this->env = 'admin';
				break;
			case 'create_admin':
				$this->title = 'Администратор';
				$this->env = 'admin_create';
				break;
			case 'edit_admin':
				$this->title = 'Администратор';
				$this->env = 'admin_update';
				break;
			case 'admin_articles':
				$this->title = 'Новости';
				$this->env = 'articles';
				break;
			case 'admin_article':
				$this->title = 'Новость';
				$this->env = 'article';
				break;
		}
	}

	/**
	 * Bind data to a view
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view) {
		$this->defineEnvParameters();

		$view->with('env', $this->env);
		$view->with('pageTitle', $this->title);
	}
	
}