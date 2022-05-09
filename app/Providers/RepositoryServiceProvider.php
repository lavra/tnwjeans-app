<?php

namespace App\Providers;

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
        /**
        if (env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }
        **/
        $models = array(
            'Whatsapp',
            'Shopping',
            'ConfigSite',
            'SocialShare',
            'SocialFollow',
            'SocialNetwork'
        );

        foreach ($models as $model) {
            $this->app->bind("App\Interfaces\\{$model}Interface", "App\Repositories\\{$model}Repository");
        }
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
