<?php

namespace App\Providers;

use App\Services\TaskService;
use App\Services\TaskServiceContract;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TaskServiceContract::class,
            TaskService::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [TaskService::class];
    }
}
