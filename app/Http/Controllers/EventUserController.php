<?php

namespace App\Http\Controllers;

use App\EventUser;
use App\State;
use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $usersfilter = function($data){
                $temporal = $data;
                $temporal->user =  User::where('uid', $data->userid)->first();
                $temporal->state_id = $data->state;
                $temporal->rol_id = $data->rol;
                
                return $temporal;
        };
        $evtUsers = EventUser::where('event_id', $id)->get();
        $users = array_map($usersfilter, $evtUsers->all()); 
       
        return $users;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function testing(User $user)
    {
        //
        return $user;
        /* $evtUsers = EventUser::where('event_id', $id)->get();
        $users = array_map($usersfilter, $evtUsers->all());        
        return $users; */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request;
    }

    public function verifyandcreate(Request $request,$id){
        $result = self::verifyAndInviteUsers($request, $id);
        return $result;
    }
    /**
     * Create users imported in the excel
     */
    public function createImportedUser(Request $request, $id){
        $result = self::verifyAndInviteUsers($request, $id);
        return $result;
    }

    private static function verifyAndInviteUsers($request, $id){

        //Inicializamos el servicio de firebase
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $auth = $firebase->getAuth();

        //intentamos buscar el usuario en la autenticacion o lo creamos
        $userData = null;
        try {
            $userData = $auth->getUserByEmail($request->email);
        }catch (\Exception $e) {
            $url = "http://localhost:3020";
            $data = json_encode($request->all());
            $httpRequest = array(
                'http' =>
                    array(
                        'method' => 'POST',
                        'header' => 'Content-type: application/json',
                        'content' => $data
                    )
            );
            $context = stream_context_create($httpRequest);
            $response = json_decode(file_get_contents($url, false, $context)); 
            $userData = $auth->getUserByEmail($request->email);       
        }
        if (!$userData->uid) {
         return "false";
        }

        try {

            //acualizamos la información del usuario
            $user = User::firstOrNew(['uid' => $userData->uid]);
            $user->fill($request->all());
            $user->uid = $userData->uid;
            $user->save();

            //actualizamos el UserEvent
            $userEvent = EventUser::firstOrNew(
                ['userid' => $userData->uid,
                'event_id'=>$id
            ]);

            $userEvent->fill($request->all());    
            $userEvent->userid = $userData->uid;
            $userEvent->event_id = $id;
            
            if (!isset($userEvent->rol_id)) {
                $rol = Rol::where('level', 0)->first();
                $userEvent->rol_id = $rol->_id;
            }

            if (!isset($userEvent->status)) {
                //Aca jala el primer estado que se encuentra, por que se necesita uno por defecto
                $temp = State::first();
                $userEvent->state_id = $temp->_id;
            }

            $userEvent->save();

            return "true";
            
        } catch (\Exception $e) {
            //var_dump($e->getMessage());
            return "false";
        }

        return "true";
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show(EventUser $eventUser)
    {
        //
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EventUser $eventUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventUser $eventUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }
}
