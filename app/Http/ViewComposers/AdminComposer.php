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
				$this->title = 'Добавить администратора';
				$this->env = 'admin_create';
				break;
			case 'edit_admin':
				$this->title = 'Изменить администратора';
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
			case 'edit_article':
				$this->title = 'Изменить новость';
				$this->env = 'update_article';
				break;
			case 'create_article':
				$this->title = 'Добавить новость';
				$this->env = 'create_article';
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
				$this->title = 'Добавить проект';
				$this->env = 'create_project';
				break;
			case 'edit_project':
				$this->title = 'Изменить проект';
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
				$this->title = 'Добавить категорию';
				$this->env = 'create_category';
				break;
			case 'edit_category':
				$this->title = 'Изменить категорию';
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
				$this->title = 'Добавить профайл';
				$this->env = 'create_profile';
				break;
			case 'edit_profile':
				$this->title = 'Изменить профайл';
				$this->env = 'update_profile';
				break;
			case 'admin_positions':
				$this->title = 'Вакансии';
				$this->env = 'positions';
				break;
			case 'admin_position':
				$this->title = 'Вакансия';
				$this->env = 'profile';
				break;
			case 'create_position':
				$this->title = 'Добавить вакансию';
				$this->env = 'create_position';
				break;
			case 'edit_position':
				$this->title = 'Изменить вакансию';
				$this->env = 'update_position';
				break;
			case 'admin_reports':
				$this->title = 'Отчеты';
				$this->env = 'reports';
				break;
			case 'admin_report':
				$this->title = 'Отчет';
				$this->env = 'report';
				break;
			case 'create_report':
				$this->title = 'Добавить отчет';
				$this->env = 'create_report';
				break;
			case 'edit_report':
				$this->title = 'Изменить отчет';
				$this->env = 'update_report';
				break;
			case 'admin_subscribers':
				$this->title = 'Подписчики';
				$this->env = 'subscribers';
				break;
			case 'admin_about':
				$this->title = 'Ver 2.5';
				$this->env = 'about';
				break;
			case 'recent_admins':
				$this->title = 'Последние админы';
				break;
			case 'recent_articles':
				$this->title = 'Последние новости';
				break;
			case 'recent_profiles':
				$this->title = 'Последние профайлы';
				break;
			case 'recent_positions':
				$this->title = 'Последние вакансии';
				break;
			case 'recent_documents':
				$this->title = 'Последние документы';
				break;
			case 'recent_subscribers':
				$this->title = 'Последние подписчики';
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