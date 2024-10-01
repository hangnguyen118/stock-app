<?php

namespace App\Providers;

use App\Contracts\Interfaces\ArtRepositoryInterface;
use App\Contracts\Interfaces\CustomerRepositoryInterface;
use App\Contracts\Interfaces\GalleryRepositoryInterface;
use App\Contracts\interfaces\LableRepositoryInterface;
use App\Contracts\Interfaces\TagRepositoryInterface;
use App\Contracts\Interfaces\UserRepositoryInterface;
use App\Repositories\ArtRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\FavouriteRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\LableRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArtRepositoryInterface::class, ArtRepository::class);
        $this->app->singleton(FavouriteRepository::class, function ($app) {
            return new FavouriteRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}