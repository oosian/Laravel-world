<?php

namespace Oosian\LaravelWorld;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class ContactServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function loadEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php");
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
        $this->loadEloquentFactoriesFrom(__DIR__.'/../database/factories/');
    }

    public function register()
    {

    }

}