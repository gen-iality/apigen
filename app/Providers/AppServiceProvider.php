<?php

namespace App\Providers;

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

//use Kreait\Firebase\Auth;

class AppServiceProvider extends ServiceProvider implements ShouldQueue
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        setlocale(LC_ALL, "es_ES.utf8");
        \Carbon\Carbon::setLocale(config('app.locale'));
        Log::debug("Booting");
        Resource::withoutWrapping();

        //Esta duplicando los eventos aún no entiendo porque
        //\App\Attendee::observe(\App\Observers\EventUserObserver::class);

        /*\App\Attendee::saved(function ($eventUser) {
        Log::debug("\App\Attendee::saved boot");
        });
         */
        \App\Attendee::deleted(function ($eventUser) {
            self::deleteFirestore($eventUser->event_id . '_event_attendees', $eventUser->_id);
        });

        \App\Attendee::saved(
            function ($eventUser) {
                Log::debug("\App\Attendee::saved boot");
                //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
                $email = (isset($eventUser->user->email)) ? $eventUser->user->email : "apps@mocionsoft.com";
                /**
                 * Guardar en firestore
                 * Debes enviar:
                 *      1. la COLLECCIÓN que deseas guardar,
                 *      2. El id del DOCUMENTO
                 *      3. La información que desear guardar en el documento COLLECCIÓN.
                 */
                self::saveFirestore($eventUser->event_id . '_event_attendees', $eventUser->_id, $eventUser);
                /**
                 * Guardar en firebase Real Data Time
                 * Debes enviar:
                 *      1. la COLLECCIÓN que deseas guardar,
                 *      2. El id del DOCUMENTO
                 *      3. La información que desear guardar en el documento COLLECCIÓN.
                 */
                //self::saveFirebase('users', $eventUser->_id, $eventUser->properties);

                /* Esto se uso cuando un usuario estaba con reserva y luego compraba el tickete
            $original = $eventUser->getOriginal();

            if ($eventUser->state_id == Attendee::STATE_BOOKED && isset($original['state_id']) && $original['state_id'] != Attendee::STATE_BOOKED) {
            // Mail::to($email)
            //     ->queue(
            //         new BookingConfirmed($eventUser)
            //     );
            }*/
            }
        );
        setlocale(LC_ALL, "es_ES.UTF-8");
        \Carbon\Carbon::setLocale(config('app.locale'));

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
                $fireauth = (new Factory)
                    ->withServiceAccount(base_path('firebase_credentials.json'))
                    ->createAuth();

                return $fireauth;
            }
        );

        $this->app->singleton(
            'Kreait\Firebase\Firestore', function ($app) {
                $firebase = (new Factory)
                    ->withServiceAccount(base_path('firebase_credentials.json'))
                    ->createFirestore();

                return $firebase;
            }
        );
        // $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        // $firestore = (new Factory)->withServiceAccount($serviceAccount)->createFirestore();

        $this->app->bind(
            'App\evaLib\Services\UserEventService', function ($app) {
                return new UserEventService();
            }
        );

    }

    /**
     * Save Firestore
     *
     * Este controlador fue diseñado para exportar un event_user que se encuentran en mongo
     * Realizando una migración por medio del id,
     *
     * para mas información acerca del funcionamiento de firestore con php sigue el siguiente link
     * https://github.com/morrislaptop/firestore-php
     *
     * El controlador sigue los siguientes pasos:
     *      1. Se abre el servicio de firestore
     *      2. Captura toda la información del event_users
     *      3. Se diríge a la collección, el cual es el mismo nombre "event_users"
     *      4. Recorre todos los usuarios encontrados anteriormente pero.
     *          4.1. Si los datos del usuario existen entonces.
     *          4.2. Guarda un nuevo documento con el id del event_user.
     *          4.3. Convertimos los datos del usuario en un array para poder guardarlo.
     *          4.4. Dentro del documento guardamos los datos del usuario.
     *      5. Al finalizar retornamos un mensaje sobre la culminación del trabajo
     *
     * @return \Illuminate\Http\Response
     */
    public function saveFirestore($collectionpath, $document, $data)
    {
        $firebase = new FirestoreClient([
            'keyFilePath' => base_path('firebase_credentials.json'),
        ]);

        if ($data) {
            Log::debug($collectionpath);
            $collection = $firebase->collection($collectionpath);
            $user = $collection->document($document);
            $dataUser = json_decode($data, true);
            $dataUser['updated_at'] = date_create();
            $dataUser['created_at'] = ($dataUser['created_at']) ? date_create($dataUser['created_at']) : date_create();
            // var_dump($dataUser);
            $user->set($dataUser);

        }
    }

    public function deleteFirestore($collectionpath, $document)
    {
        $firebase = new FirestoreClient([
            'keyFilePath' => base_path('firebase_credentials.json'),
        ]);

        $collection = $firebase->collection($collectionpath);
        $doc = $collection->document($document);
        $doc->delete();

    }
}