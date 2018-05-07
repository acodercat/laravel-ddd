<?php

namespace App\Auth\Providers;



use Illuminate\Support\ServiceProvider;
use \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;

class DoctrineMappingServiceProvider extends ServiceProvider
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



    protected function setMetadataDriver()
    {

        $namespaces = [base_path('app/Auth/Infrastructure/Persistence/Doctrine/Mappings') => 'App\Auth\Domain\Model\Account'];
        $driver = new SimplifiedXmlDriver($namespaces);
        $this->app->make('em')->getConfiguration()->setMetadataDriverImpl($driver);

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setMetadataDriver();
    }
}
