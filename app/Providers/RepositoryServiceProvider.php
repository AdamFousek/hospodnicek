<?php

namespace App\Providers;

use App\Repositories\Illuminate\InnRepository;
use App\Repositories\IlluminateInnRepositoryInterface;
use App\Repositories\InnRepositoryInterface;
use App\Repositories\Meilisearch\MeilisearchInnRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Meilisearch
        $this->app->bind(InnRepositoryInterface::class, MeilisearchInnRepository::class);

        // Illuminate
        $this->app->bind(IlluminateInnRepositoryInterface::class, InnRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
