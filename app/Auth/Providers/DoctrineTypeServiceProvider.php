<?php

namespace App\Auth\Providers;


use Illuminate\Support\ServiceProvider;

use \Doctrine\DBAL\Types\Type;

class DoctrineTypeServiceProvider extends ServiceProvider
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

    protected function addDoctrineType() {
//        Type::addType('physicalExamineState', \App\Auth\Infrastructure\Persistence\Doctrine\Staff\StateType::class);

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->addDoctrineType();

    }
}
