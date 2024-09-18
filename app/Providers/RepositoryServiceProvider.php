<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    { 
        $this->app->bind(
            'App\Contracts\interfaces\LableRepositoryInterface',
            'App\Repositories\LableRepository'
        );      
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}