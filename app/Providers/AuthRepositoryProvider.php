<?php

namespace App\Providers;

use App\Repository\DBAuthRepository;
use App\RepositoryInterface\AuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AuthRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, DBAuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
