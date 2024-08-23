<?php

namespace App\Providers;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        UserRepository::class => UserRepositoryEloquent::class,
    ];

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
        foreach ($this->repositories as $contract => $repository) {
            $this->app->singleton($contract, $repository);
        }
        //:end-bindings:
    }
}
