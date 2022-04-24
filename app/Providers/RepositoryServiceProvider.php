<?php

namespace App\Providers;

use App\Interfaces\ConfigSiteInterface;
use App\Repositories\ConfigSiteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConfigSiteInterface::class, ConfigSiteRepository::class);

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
