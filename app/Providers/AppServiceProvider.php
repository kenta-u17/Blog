<?php

namespace App\Providers;

use App;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\App::environment(['production'])) {
            \URL::forceScheme('https');
        }
    }
}
