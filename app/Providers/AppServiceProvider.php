<?php

namespace App\Providers;

use App\Observers\EventUserObserver;
use Illuminate\Support\Facades\Log;
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
        Log::debug("definiendo observador");
        \App\EventUser::observe(App\Observers\EventUserObserver::class);

        \App\EventUser::saving(function ($model) {
            Log::debug("saving afuera");
        });
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
