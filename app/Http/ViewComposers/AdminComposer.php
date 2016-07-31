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
			case 'admin_projects':
				$this->title = 'Проекты';
				$this->env = 'projects';
				break;
			case 'admin_project':
				$this->title = 'Проект';
				$this->env = 'project';
				break;
			case 'create_project':
				$this->title = 'Проект';
				$this->env = 'create_project';
				break;
			case 'edit_project':
				$this->title = 'Проект';
				$this->env = 'update_project';
				break;
			case 'admin_categories':
				$this->title = 'Категории';
				$this->env = 'categories';
				break;
			case 'admin_category':
				$this->title = 'Категория';
				$this->env = 'category';
				break;
			case 'create_category':
				$this->title = 'Категория';
				$this->env = 'create_category';
				break;
			case 'edit_category':
				$this->title = 'Категория';
				$this->env = 'update_category';
				break;
			case 'admin_profiles':
				$this->title = 'Профайлы';
				$this->env = 'profiles';
				break;
			case 'admin_profile':
				$this->title = 'Профайл';
				$this->env = 'profile';
				break;
			case 'create_profile':
				$this->title = 'Профайл';
				$this->env = 'create_profile';
				break;
			case 'edit_profile':
				$this->title = 'Профайл';
				$this->env = 'update_profile';
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