<?php

namespace App\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
//        $this->app->register(DomainServiceServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(DoctrineTypeServiceProvider::class);
        $this->app->register(DoctrineMappingServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(DomainServiceServiceProvider::class);

    }
}
