<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\Internal\Interfaces\VesselsServiceInterface',
            'App\Services\Internal\Implementations\VesselsService'
        );

        $this->app->bind(
            'App\Repositories\Eloquent\Internal\Interfaces\ShipPositionRepositoryInterface',
            'App\Repositories\Eloquent\Internal\Implementations\ShipPositionRepository'
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
