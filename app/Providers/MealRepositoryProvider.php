<?php

namespace App\Providers;

use App\Repository\DBMealRepository;
use App\RepositoryInterface\MealRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class MealRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(MealRepositoryInterface::class, DBMealRepository::class);
    }
}
