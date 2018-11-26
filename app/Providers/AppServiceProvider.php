<?php

namespace App\Providers;

use App\EventUser;
use App\Mail\BookingConfirmed;
use App\Observers\EventUserObserver;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
        Resource::withoutWrapping();

        \App\EventUser::observe(App\Observers\EventUserObserver::class);

        \App\EventUser::saved(
            function ($eventUser) {
                //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
                $email = (isset($eventUser->user->email)) ? $eventUser->user->email : "cesar.torres@mocionsoft.com";

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
                self::saveFirebase('users', $eventUser->_id, $eventUser->properties);

                $original = $eventUser->getOriginal();

                if ($eventUser->state_id == EventUser::STATE_BOOKED && isset($original['state_id']) && $original['state_id'] != EventUser::STATE_BOOKED) {
                    Mail::to($email)
                        ->queue(
                            new BookingConfirmed($eventUser)
                        );
                }
            }
        );

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
                $firebase = (new \Kreait\Firebase\Factory)
                    ->withServiceAccount($serviceAccount)
                    ->create();
                return $firebase->getAuth();
            }
        );

        $this->app->singleton(
            'Morrislaptop\Firestore', function ($app) {
                $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
                $firebase = (new \Morrislaptop\Firestore\Factory)
                    ->withServiceAccount($serviceAccount)
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
    public function saveFirestore($collection, $document, $data)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new \Morrislaptop\Firestore\Factory)
            ->withServiceAccount($serviceAccount)
            ->createFirestore();

        if ($data) {
            Log::debug($collection);
            $collection = $firebase->collection($collection);
            $user = $collection->document($document);
            $dataUser = json_decode($data, true);
            $dataUser['updated_at'] = date_create();
            $dataUser['created_at'] = ($dataUser['created_at']) ? date_create($dataUser['created_at']) : date_create();
            // var_dump($dataUser);
            $user->set($dataUser);

        }
    }

    /**
     * Event User
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
    public function saveFirebase($collection, $user_id, $data)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new \Kreait\Firebase\Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();

        if ($data) {
            $db->getReference($collection . '/' . $user_id)->set($data);
        }
    }
}
