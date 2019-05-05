<?php

namespace PSkordilakis\BladeClassDirective;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('class', function ($expression) {
            return "<?php echo 'class=\"' . classNames($expression) . '\"' ?>";
        });
    }
}