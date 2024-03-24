<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\LastFm;
use App\Services\LastFm\LastFmService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
