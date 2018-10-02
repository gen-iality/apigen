<?php

namespace App\Http\Controllers;

use App\OrganizationUser;
use App\User;
use App\Http\Resources\OrganizationUserResource;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class OrganizationUserController extends Controller
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
            $temporal->rol_id = $data->rol;
            $temporal->state_id = $data->state;
            return $temporal;
        };
        $evtUsers = OrganizationUserResource::collection(
            OrganizationUser::where('organization_id', $id)
            ->paginate(config('app.page_size'))
        );
            $users = array_map($usersfilter, $evtUsers->all()); 
    
        return $evtUsers;
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $result = new OrganizationUser($request->all());
        $result->save();
        return $result;
    }


    public function verifyandcreate(Request $request, $id)
    {
        //

        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $auth = $firebase->getAuth();
        try {
            $userData = $auth->getUserByEmail($request->email);
            
            if($userData->uid){
                $result = new OrganizationUser($request->all());
                $result->userid = $userData->uid;
                $result->organization_id = $id;
                $result->save();
                return $result;
            }else{
                return "no";
            }   
        } catch (\Exception $e) {
            echo 'Excepción capturada: '. $e->getMessage();
        } 
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationUser $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationUser $organizationUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationUser $id)
    {
        //
        $data = $request->all();
        $id->fill($data);
        $id->save();
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationUser $organizationUser)
    {
        //
    }
}
