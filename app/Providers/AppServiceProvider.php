<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Help;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
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
