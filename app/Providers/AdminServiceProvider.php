<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__.'/../composers.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind admin services repository
        $this->app->bind(
            'App\Repositories\Admin\Services\ServiceRepository',
            'App\Repositories\Admin\Services\EloquentServiceRepository'
        );
    }
}
