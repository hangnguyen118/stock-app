<?php

namespace App\Providers;

use App\Contracts\interfaces\LableRepositoryInterface;
use App\Contracts\Interfaces\TagRepositoryInterface;
use App\Repositories\LableRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LableRepositoryInterface::class, LableRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}