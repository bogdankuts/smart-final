var elixir = require('laravel-elixir');
require('rome');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('style.scss', 'public/css/style.css');
	mix.sass('/admin/admin.scss', 'public/css/admin/style.css');
});
