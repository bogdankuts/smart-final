<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
	Route::get('/',                         ['as' => 'dashboard',           'uses' => 'DashboardController@dashboard']);
	Route::get('/about',                    ['as' => 'admin_about',         'uses' => 'DashboardController@about']);

	//Recent
	Route::group(['prefix' => 'recent'], function() {
		Route::get('/admins/{lastVisit}',       ['as' => 'recent_admins',       'uses' => 'DashboardController@recentAdmins']);
		Route::get('/articles/{lastVisit}',     ['as' => 'recent_articles',     'uses' => 'DashboardController@recentArticles']);
		Route::get('/profiles/{lastVisit}',     ['as' => 'recent_profiles',     'uses' => 'DashboardController@recentProfiles']);
		Route::get('/positions/{lastVisit}',    ['as' => 'recent_positions',    'uses' => 'DashboardController@recentPositions']);
		Route::get('/documents/{lastVisit}',    ['as' => 'recent_documents',    'uses' => 'DashboardController@recentDocuments']);
		Route::get('/subscribers/{lastVisit}',  ['as' => 'recent_subscribers',  'uses' => 'DashboardController@recentSubscribers']);
	});

	//Articles
	Route::group(['prefix' => 'articles'], function() {
		Route::post('/',                    ['as' => 'store_article',       'uses' => 'ArticlesController@store']);
		Route::get('/',                     ['as' => 'admin_articles',      'uses' => 'ArticlesController@index']);
		Route::get('/create',               ['as' => 'create_article',      'uses' => 'ArticlesController@create']);
		Route::get('/{article}',            ['as' => 'admin_article',       'uses' => 'ArticlesController@show']);
		Route::match(
		['put','patch'], '/{article}',      ['as' => 'update_article',      'uses' => 'ArticlesController@update']);
		Route::delete('/{article}',         ['as' => 'delete_article',      'uses' => 'ArticlesController@delete']);
		Route::get('/{article}/edit',       ['as' => 'edit_article',        'uses' => 'ArticlesController@edit']);
	});

	//Admins
	Route::group(['prefix' => 'admins'], function() {
		Route::post('/',                    ['as' => 'store_admin',         'uses' => 'AdminsController@store']);
		Route::get('/',                     ['as' => 'admins',              'uses' => 'AdminsController@index']);
		Route::get('/create',               ['as' => 'create_admin',        'uses' => 'AdminsController@create']);
		Route::get('/{admin}',              ['as' => 'admin',               'uses' => 'AdminsController@show']);
		Route::match(
		['put','patch'], '/{admin}',        ['as' => 'update_admin',        'uses' => 'AdminsController@update']);
		Route::delete('/{admin}',           ['as' => 'delete_admin',        'uses' => 'AdminsController@delete']);
		Route::get('/{admin}/edit',         ['as' => 'edit_admin',          'uses' => 'AdminsController@edit']);
	});

	//Reports
	Route::group(['prefix' => 'reports'], function() {
		Route::post('/',                    ['as' => 'store_report',        'uses' => 'ReportsController@store']);
		Route::get('/',                     ['as' => 'admin_reports',       'uses' => 'ReportsController@index']);
		Route::get('/create',               ['as' => 'create_report',       'uses' => 'ReportsController@create']);
		Route::get('/{report}',             ['as' => 'admin_report',        'uses' => 'ReportsController@show']);
		Route::match(
		['put','patch'], '/{report}',       ['as' => 'update_report',       'uses' => 'ReportsController@update']);
		Route::delete('/{report}',          ['as' => 'delete_report',       'uses' => 'ReportsController@delete']);
		Route::get('/{report}/edit',        ['as' => 'edit_report',         'uses' => 'ReportsController@edit']);
	});

	//Profiles
	Route::group(['prefix' => 'profiles'], function() {
		Route::post('/',                    ['as' => 'store_profile',       'uses' => 'ProfilesController@store']);
		Route::get('/',                     ['as' => 'admin_profiles',      'uses' => 'ProfilesController@index']);
		Route::get('/create',               ['as' => 'create_profile',      'uses' => 'ProfilesController@create']);
		Route::get('/{profile}',            ['as' => 'admin_profile',       'uses' => 'ProfilesController@show']);
		Route::match(
		['put','patch'], '/{profile}',      ['as' => 'update_profile',      'uses' => 'ProfilesController@update']);
		Route::delete('/{profile}',         ['as' => 'delete_profile',      'uses' => 'ProfilesController@delete']);
		Route::get('/{profile}/edit',       ['as' => 'edit_profile',        'uses' => 'ProfilesController@edit']);
	});

	//Positions
	Route::group(['prefix' => 'positions'], function() {
		Route::post('/',                    ['as' => 'store_position',      'uses' => 'PositionsController@store']);
		Route::get('/',                     ['as' => 'admin_positions',     'uses' => 'PositionsController@index']);
		Route::get('/create',               ['as' => 'create_position',     'uses' => 'PositionsController@create']);
		Route::get('/{position}',           ['as' => 'admin_position',      'uses' => 'PositionsController@show']);
		Route::match(
		['put','patch'], '/{position}',     ['as' => 'update_position',     'uses' => 'PositionsController@update']);
		Route::delete('/{position}',        ['as' => 'delete_position',     'uses' => 'PositionsController@delete']);
		Route::get('/{position}/edit',      ['as' => 'edit_position',       'uses' => 'PositionsController@edit']);
	});

	//Projects
	Route::group(['prefix' => 'projects'], function() {
		Route::post('/',                    ['as' => 'store_project',      'uses' => 'ProjectsController@store']);
		Route::get('/',                     ['as' => 'admin_projects',     'uses' => 'ProjectsController@index']);
		Route::get('/create',               ['as' => 'create_project',     'uses' => 'ProjectsController@create']);
		Route::get('/{project}',            ['as' => 'admin_project',      'uses' => 'ProjectsController@show']);
		Route::match(
			['put','patch'], '/{project}',  ['as' => 'update_project',     'uses' => 'ProjectsController@update']);
		Route::delete('/{project}',         ['as' => 'delete_project',     'uses' => 'ProjectsController@delete']);
		Route::get('/{project}/edit',       ['as' => 'edit_project',       'uses' => 'ProjectsController@edit']);
	});

	//Categories
	Route::group(['prefix' => 'categories'], function() {
		Route::post('/',                     ['as' => 'store_category',      'uses' => 'CategoriesController@store']);
		Route::get('/',                      ['as' => 'admin_categories',    'uses' => 'CategoriesController@index']);
		Route::get('/create',                ['as' => 'create_category',     'uses' => 'CategoriesController@create']);
		Route::get('/{category}',            ['as' => 'admin_category',      'uses' => 'CategoriesController@show']);
		Route::match(
			['put','patch'], '/{category}',  ['as' => 'update_category',     'uses' => 'CategoriesController@update']);
		Route::delete('/{category}',         ['as' => 'delete_category',     'uses' => 'CategoriesController@delete']);
		Route::get('/{category}/edit',       ['as' => 'edit_category',       'uses' => 'CategoriesController@edit']);
	});

	//Subscribers
	Route::group(['prefix' => 'subscribers'], function() {
		Route::get('/',                      ['as' => 'admin_subscribers',          'uses' => 'SubscribersController@index']);
		Route::get('/load',                  ['as' => 'admin_load_subscribers',     'uses' => 'SubscribersController@load']);
		Route::get('/load-xls',              ['as' => 'admin_load_subscribers_xls', 'uses' => 'SubscribersController@loadXls']);
		Route::delete('/{subscriber}',       ['as' => 'delete_subscriber',          'uses' => 'SubscribersController@delete']);
	});

});

//Auth
Route::auth();

//Subscribe
Route::post('/subscribe/{lang?}',                           ['as' => 'subscribe',           'uses' => 'PagesController@subscribe']);

//Articles
Route::get('/articles/{lang?}',                             ['as' => 'articles',            'uses' => 'ArticlesController@index']);
Route::get('/articles/{article}/{lang?}',                   ['as' => 'article',             'uses' => 'ArticlesController@show']);

//Opportunities
Route::get('/opportunities/{type}/{lang?}',                 ['as' => 'opportunity_group',   'uses' => 'OpportunitiesController@index']);
Route::get('/opportunities/{article}/{type}/{lang?}',       ['as' => 'opportunity',         'uses' => 'ArticlesController@show']);

//Projects
Route::get('/branches/{field}/{lang?}',                     ['as' => 'field',               'uses' => 'ProjectsController@index']);
Route::get('/branches/{field}/{project}/{lang?}',           ['as' => 'project',             'uses' => 'ProjectsController@show']);
Route::get('/branches/{article}/{field}/{project}/{lang?}', ['as' => 'project_text',        'uses' => 'ArticlesController@show']);

//About
Route::get('/about/{type}/{lang?}',                         ['as' => 'about',               'uses' => 'AboutController@about']);
Route::get('/about/reports/{report}/{lang?}',               ['as' => 'report',              'uses' => 'AboutController@report']);
Route::post('/increment-views-report/{report}',             ['as' => 'ajax_views_reports',  'uses' => 'AboutController@incrementViewsReport']);

//About project
Route::get('/about-the-project/{type}/{lang?}',             ['as' => 'about_project',       'uses' => 'AboutProjectController@index']);
Route::get('/about-the-project/{article}/{type}/{lang?}',   ['as' => 'story',               'uses' => 'ArticlesController@show']);

//Pages
Route::get('/contacts/{lang?}',                             ['as' => 'contacts',            'uses' => 'PagesController@contacts']);
Route::get('/help-the-project/{lang?}',                     ['as' => 'donate',              'uses' => 'PagesController@donate']);
Route::post('/increment-views-profile/{profile}',           ['as' => 'ajax_views_profile',  'uses' => 'AboutProjectController@incrementViewsProfile']);
Route::post('/increment-views-position/{position}',         ['as' => 'ajax_views_positions','uses' => 'AboutProjectController@incrementViewsPosition']);
Route::get('/{lang?}',                                      ['as' => 'index',               'uses' => 'PagesController@index']);

