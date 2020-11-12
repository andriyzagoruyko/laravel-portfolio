<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('navactive', function($route){
            return "<?php echo strpos(Route::currentRouteName(), $route) !== false  ? 'is-active' : '' ?>";
        });

        Blade::directive('localeactive', function($locale){
            return "<?php echo \App\Classes\EditingLocalization::getCurrentLocale() === $locale ? 'is-active' : '' ?>";
        });
    }
}
