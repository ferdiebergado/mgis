<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Region\RegionEloquentRepository;
use App\Repositories\Region\RegionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegionRepositoryInterface::class, RegionEloquentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
