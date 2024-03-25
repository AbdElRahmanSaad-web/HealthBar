<?php

namespace App\Providers;

use App\Repository\DBOrderRepository;
use App\RepositoryInterface\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class OrderRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, DBOrderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
