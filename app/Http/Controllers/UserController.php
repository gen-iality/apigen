<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\Auth\Token\Verifier;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Event;
use App\EventUser;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\State;
use App\User;
use Illuminate\Http\Response;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function storeRefreshToken()
    {
        return ["status"=>'true'];
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function VerifyAccount(Request $request, $uid)
    {
        $data = $request->json()->all();
        $user = User::where("uid", $uid);
        $password = $data["password"];

        $firebaseToken = null;
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $auth = $firebase->getAuth();
        $user_auth = $auth->updateUser($uid, [  
            "password" => $password,
            "emailVerified" => true
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
