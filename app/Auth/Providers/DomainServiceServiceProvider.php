<?php

namespace App\Auth\Providers;



use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;

class DomainServiceServiceProvider extends BaseServiceProvider
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
        $this->app->bind(\App\Auth\Domain\Services\EncryptionService::class, \App\Auth\Infrastructure\Services\Md5EncryptionService::class);
    }
}
