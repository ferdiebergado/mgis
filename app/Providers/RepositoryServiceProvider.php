<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Region\RegionEloquentRepository;
use App\Repositories\Region\RegionRepositoryInterface;
use App\Repositories\School\SchoolEloquentRepository;
use App\Repositories\School\SchoolRepositoryInterface;

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
        $this->app->bind(SchoolRepositoryInterface::class, SchoolEloquentRepository::class);
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
