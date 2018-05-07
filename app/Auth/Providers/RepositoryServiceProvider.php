<?php

namespace App\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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



    protected function bindRepository() {
        $this->app->bind(\App\Auth\Domain\Model\Account\AccountRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new  \App\Auth\Infrastructure\Persistence\Doctrine\Repositories\DoctrineAccountRepository (
                $app['em'],
                $app['em']->getClassMetaData(\App\Auth\Domain\Model\Account\Account::class)
            );
        });

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepository();


    }
}
