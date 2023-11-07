<?php

namespace App\Providers;

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
        $this->app->bind(InnRepositoryInterface::class, MeilisearchInnRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
