<?php

namespace App\Providers;

use App\Http\Service\CityServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        $this->app->bind(
            'App\Http\Service\CityServiceInterface',
            'App\Http\Service\CityService');

        $this->app->bind(
            'App\Http\Repository\CityRepositoryInterface',
            'App\Http\Repository\CityRepository');

    }
}
