<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;
use Firebase\Auth\Token\Verifier;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Event;
use App\EventUser;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\State;
use Illuminate\Http\Response;
use Validator;
use Storage;

class UserController extends Controller
{
    public function storeRefreshToken()
    {
        return ["status" => 'true'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersResource::collection(
            User::paginate(config('app.page_size'))
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new User($data);
        $result->save();
        return $result;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        //
        $User = User::find($id);
        $response = new UsersResource($User);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $User = User::find($id);
        $User->fill($data);
        $User->save();
        return $data;
    }

    public function VerifyAccount(Request $request, \Kreait\Firebase\Auth $auth, $uid)
    {
        $data = $request->json()->all();
        $user = User::where("uid", $uid);
        $password = $data["password"];

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
        $User = User::find($id);
        $res = $User->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }
}
