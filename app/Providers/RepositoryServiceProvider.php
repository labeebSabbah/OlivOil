<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use App\Repositories\OilRepository;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\OilRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OilRepositoryInterface::class, OilRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
