<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set the default string length to avoid MySQL errors on older versions
        Schema::defaultStringLength(191);

        Paginator::useBootstrapFour();

        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
