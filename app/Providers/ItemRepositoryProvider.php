<?php

namespace App\Providers;

use App\Repository\DBItemRepository;
use App\RepositoryInterface\ItemRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ItemRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, DBItemRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
