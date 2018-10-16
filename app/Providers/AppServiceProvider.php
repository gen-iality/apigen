<?php

namespace App\Providers;

use App\EventUser;
use App\Mail\BookingConfirmed;
use App\Observers\EventUserObserver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
//use Kreait\Firebase\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
        Log::debug("definiendo observador");
        \App\EventUser::observe(App\Observers\EventUserObserver::class);

        \App\EventUser::saved(function ($eventUser) {
            Log::debug("ejecutando observador saved eventUser");
            //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
            $email = (isset($eventUser->user->email)) ? $eventUser->user->email : "cesar.torres@mocionsoft.com";
            Log::debug("saved afuera " . $eventUser->state_id . " " . EventUser::STATE_BOOKED);
            if ($eventUser->state_id == EventUser::STATE_BOOKED) {
                Log::debug("saved adentro vamos a enviar el email");
                // var_dump($eventUser->event_id);
                Mail::to($email)
                    ->send(
                        new BookingConfirmed($eventUser)
                    );
            }
        });


        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

      /*  $this->app->bind(
            'App\evaLib\Services\FilterQuery', function ($app) {
                return new FilterQuery();
            }
        );*/

        $this->app->singleton(
            'Kreait\Firebase\Auth', function ($app) {
               $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
               $firebase = (new Factory)
                    ->withServiceAccount($serviceAccount)
                    ->create();
                return $firebase->getAuth();
            }
        );

        $this->app->bind(
            'App\evaLib\Services\UserEventService', function ($app) {
                return new UserEventService();
            }
        );


    }
}
