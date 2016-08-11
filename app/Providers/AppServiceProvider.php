<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Help;

class AppServiceProvider extends ServiceProvider
{

	private $views = ['pages/index',
	                  'pages/articles',
	                  'pages/article',
	                  'pages/opportunities',
	                  'pages/opportunity_group',
	                  'pages/projects',
	                  'pages/field',
	                  'pages/project',
	                  'pages/about',
	                  'pages/story',
	                  'pages/all_reports',
	                  'pages/docs',
	                  'pages/reports',
	                  'pages/report',
	                  'pages/team',
	                  'pages/profiles',
	                  'pages/profile',
	                  'pages/positions',
	                  'pages/position',
	                  'pages/stories',
	                  'pages/story',
	                  'pages/about_project',
	                  'pages/about',
	                  'pages/contacts',
	                  'pages/donate',
	                  'errors/404',
	];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
	    view()->composer($this->views, 'App\Http\ViewComposers\FrontComposer');
	    view()->composer('admin/*', 'App\Http\ViewComposers\AdminComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
