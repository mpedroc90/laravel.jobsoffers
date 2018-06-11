<?php

namespace App\Providers;

use App\Repositories\EmployerRepository;
use App\Repositories\IEmployerRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
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
        $this->app->bind ('App\Repositories\IEmployerRepository','App\Repositories\EmployerRepository');
    }
}
