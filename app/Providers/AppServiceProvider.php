<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\EventUserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //use App\Observers\EventUserObserver;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\evaLib\Services\UserEventService', function ($app) {
                return new UserEventService();
            }
        );
    }
}
