<?php

namespace App\Http\Controllers;

use Morrislaptop\Firestore\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Http\Request;
use App\Attendee;

class synchronizationController extends Controller
{
    /**
     * Event Users
     * 
     * Este controlador fue diseñado para exportar todos los event_users que se encuentran en mongo
     * Realizando una migración completa,
     *
     * para mas información acerca del funcionamiento de firestore con php sigue el siguiente link
     * https://github.com/morrislaptop/firestore-php
     * 
     * El controlador sigue los siguientes pasos:
     *      1. Se abre el servicio de firestore
     *      2. Captura toda la información de la table event_users
     *      3. Crea la collección, el cual es el mismo nombre "event_users"
     *      4. Recorre todos los usuarios encontrados anteriormente pero.
     *          4.1. Si los datos del usuario existen entonces.
     *          4.2. Guarda un nuevo documento con el id del event_user.
     *          4.3. Convertimos los datos del usuario en un array para poder guardarlo. 
     *          4.4. Dentro del documento guardamos los datos del usuario.
     *      5. Al finalizar retornamos un mensaje sobre la culminación del trabajo
     * 
     * Inconvenientes: La cantidad de usuarios, hace que la página no responda arrogando un
     * error por limite de tiempo.
     * 
     * @return \Illuminate\Http\Response
     */
    public function EventUsers($event_id)
    {
        try{
            $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
            $firestore = (new Factory)->withServiceAccount($serviceAccount)->createFirestore();
            
            $eventUsers = Attendee::where('event_id',$event_id)->get();
            $collection = $firestore->collection($event_id.'_event_attendees');
            foreach($eventUsers as $eventUser){
                
                if($eventUser->user){
                    $user = $collection->document($eventUser->_id);
                    $dataUser = json_decode($eventUser,true);
                    $user->set($dataUser);
                }
            }
            return  response('the proccess was completed');
        } catch(exception $e){
            return $e->messsage();
        }
    }

    /**
     * Event Account
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
    public function Attendee($user)
    {

        $eventUser = Attendee::find($user);
        $firestore = resolve('Morrislaptop\Firestore');

        if($eventUser->user){
            $collection = $firestore->collection($eventUser->event_id.'-event_users');
            $user = $collection->document($eventUser->_id);
            $dataUser = json_decode($eventUser,true);
            $user->set($dataUser);
        }
        return  response('the proccess was completed');
    }

    public function EventUserRDT($user){
        $eventUser = Attendee::find($user);
        $dataUser = json_decode($eventUser,true);

        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new \Kreait\Firebase\Factory)
             ->withServiceAccount($serviceAccount)
             ->create();

        $db = $firebase->getDatabase();

        $db->getReference('users/'.$eventUser->user->_id)->set($dataUser);

        return ($db->getReference('config/website/name')->set('New name'));             
    }
}
