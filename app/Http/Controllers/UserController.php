<?php

namespace App\Http\Controllers;

use App\Account;
use App\Event;
use App\Http\Controllers\web\UserController as UserControllerWeb;
use App\Http\Resources\UsersResource;
use App\Mail\ConfirmationEmail;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\evaLib\Services\FilterQuery;
use App\Http\Resources\EventUserResource;

class UserController extends UserControllerWeb
{

    protected $auth;

    public function __construct(\Kreait\Firebase\Auth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * loginorcreatefromtoken
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//http://localhost:8000/api/user/loginorcreatefromtoken?evius_token=eyJhbGciOiJSUzI1NiIsImtpZCI6IjVlOWVlOTdjODQwZjk3ZTAyNTM2ODhhM2I3ZTk0NDczZTUyOGE3YjUiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiZXZpdXMgY28iLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZXZpdXNhdXRoIiwiYXVkIjoiZXZpdXNhdXRoIiwiYXV0aF90aW1lIjoxNTg3OTE0MjAxLCJ1c2VyX2lkIjoiNU14bXdEUlZ5MWRVTEczb1NraWdFMXNoaTd6MSIsInN1YiI6IjVNeG13RFJWeTFkVUxHM29Ta2lnRTFzaGk3ejEiLCJpYXQiOjE1ODc5MTQyMDEsImV4cCI6MTU4NzkxNzgwMSwiZW1haWwiOiJldml1c0Bldml1cy5jbyIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJldml1c0Bldml1cy5jbyJdfSwic2lnbl9pbl9wcm92aWRlciI6InBhc3N3b3JkIn19.SpgxWQeZkzXCtI3JoHuVpSU_FxhC7bhLkMpe9foQAY10KkRGEvgLp0A2Wiah7B0QKPsgMv02apTsPgl6I9Y7drV4YTq_6JaCTTjJNAJII3ani1E9lgXyXbYww60SFzuO1HDFh3BL8qLtIm07KK8tncGloHfYBoI5PxFo9OIwS5672GWaAZHwQ_5MA4gBkRxl4I4IF-T5yOr8qqEOM4T7u1kdBlWtI1xx-YOgzDu-4usAd9b8tyk0yKYNfPqP3cCClXV9WoG51hWLzdjgjUPkdhoLXXa0-U2HqmjG_WtQTQkjtrQyFHV5q7piOemqNRGJbPNMUp3P1QYL-YQax7TYWg&evius_token=eyJhbGciOiJSUzI1NiIsImtpZCI6IjVlOWVlOTdjODQwZjk3ZTAyNTM2ODhhM2I3ZTk0NDczZTUyOGE3YjUiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiZXZpdXMgY28iLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZXZpdXNhdXRoIiwiYXVkIjoiZXZpdXNhdXRoIiwiYXV0aF90aW1lIjoxNTg3OTE0MjAxLCJ1c2VyX2lkIjoiNU14bXdEUlZ5MWRVTEczb1NraWdFMXNoaTd6MSIsInN1YiI6IjVNeG13RFJWeTFkVUxHM29Ta2lnRTFzaGk3ejEiLCJpYXQiOjE1ODc5MTQyMDEsImV4cCI6MTU4NzkxNzgwMSwiZW1haWwiOiJldml1c0Bldml1cy5jbyIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJldml1c0Bldml1cy5jbyJdfSwic2lnbl9pbl9wcm92aWRlciI6InBhc3N3b3JkIn19.SpgxWQeZkzXCtI3JoHuVpSU_FxhC7bhLkMpe9foQAY10KkRGEvgLp0A2Wiah7B0QKPsgMv02apTsPgl6I9Y7drV4YTq_6JaCTTjJNAJII3ani1E9lgXyXbYww60SFzuO1HDFh3BL8qLtIm07KK8tncGloHfYBoI5PxFo9OIwS5672GWaAZHwQ_5MA4gBkRxl4I4IF-T5yOr8qqEOM4T7u1kdBlWtI1xx-YOgzDu-4usAd9b8tyk0yKYNfPqP3cCClXV9WoG51hWLzdjgjUPkdhoLXXa0-U2HqmjG_WtQTQkjtrQyFHV5q7piOemqNRGJbPNMUp3P1QYL-YQax7TYWg
    public function loginorcreatefromtoken(Request $request)
    {
        $firebaseToken = null;
        $refresh_token = null;
        $url_final_params = [];

        try {
            /**
             * Miramos si el token viene en la Petición
             * El token viene en la petición el cual si llega con el nombre evius_token o token
             * REQUEST,
             *
             * En la Petición viene el refresh_token
             */
            //

            if ($request->has('evius_token')) {$firebaseToken = $request->input('evius_token');}
            if ($request->has('refresh_token')) {$refresh_token = $request->input('refresh_token');}

            /**
             * Si el token no viene en la petición
             * Bota el error de que el token no fue enviado en la petición, recordar que esta ruta es
             * una petición GET.
             */
            if (!$firebaseToken) {
                throw new Exception('Error: No token provided');
            }

            /*
             * Se verifica la valides del token
             * Si este se encuentra activamos la función validator, el cual nos devuelve el
             * usuario y finalmente enviamos el request indicando que se puede continuar, con la página acutal.
             */

            $verifiedIdToken = $this->auth->verifyIdToken($firebaseToken);
            $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));

            $user = Account::where('uid', '=', $user_auth->uid)->first();

            if (!$user) {
                $user = Account::create(get_object_vars($user_auth));
                //We created a organization default, thus the name organitatios is the displayName user
                $organization = new Organization();
                $organization->author = $user->id;
                $organization->name = $user->displayName;
                $organization->save();

                //self::_sendConfirmationEmail(
                //    $user
                //);
            }

            //El token para refrescar tokens vencidos de expiración rápida
            if ($refresh_token) {
                $user->refresh_token = $refresh_token;
                $user->save();
            }

            $url_final_params["token"] = $firebaseToken;

        } catch (\Exception $e) {
            $url_final_params["error"] = $e->getMessage();

        } finally {
            $destination = $request->has('destination') ? $request->input('destination') : config('app.front_url');
            return redirect()->away($destination . "?" . http_build_query($url_final_params));
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersResource::collection(
            Account::paginate(config('app.page_size'))
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
        $result = new Account($data);
        $result->save();
        return $result;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Account $id)
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
        $Account = Account::find($id);
        $response = new UsersResource($Account);
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

        if (isset($data['phoneNumber']) && isset($data['picture'])) {
            $data['profile_completed'] = ($data['phoneNumber'] != "" && $data['picture'] != "") ? true : false;
        } else {
            $data['profile_completed'] = false;
        }

        $Account = Account::find($id);
        $Account->fill($data);
        $Account->save();
        return $data;
    }

    public function VerifyAccount(Request $request, \Kreait\Firebase\Auth $auth, $uid)
    {
        $data = $request->json()->all();
        $user = Account::where("uid", $uid);
        $password = $data["password"];

        $user_auth = $auth->updateUser($uid, [
            "password" => $password,
            "emailVerified" => true,
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
        $Account = Account::find($id);
        $res = $Account->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }

    /**
     * Find the specified resource from storage.
     * by email.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function findByEmail(\Kreait\Firebase\Auth $auth, $email)
    {
        try {
            $user = $auth->getUserByEmail($email);

            $Account = Account::where('uid', '=', $user->uid)
                ->get(['id', 'email', 'names', 'name', 'Nombres', 'displayName']);
            $response = new UsersResource($Account);

            return $Account;
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            return [];
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }

    }

    /**
     * Undocumented function
     *
     * @param [type] $eventUsers
     * @param [type] $message
     * @return void
     */
    private static function _sendConfirmationEmail($user)
    {
        $email = $user->email;

        // $messageUser = new MessageUser(
        //     [
        //         'email' => $eventUser->user->email,
        //         'user_id' => $eventUser->user->id,
        //         'event_user_id' => $eventUser->id,
        //     ]
        // );
        // $message->messageUsers()->save($messageUser);

        //Mail::to($email)
        //    ->queue(
        //        new ConfirmationEmail($user)
        //    );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function confirmEmail(String $id)
    {
        $user = Account::findOrFail($id);

        $user->emailVerified = true;
        $user->save();

        return redirect()->away(config('app.front_url') . "/profile/" . $user->id);
        // return ['id'=>$eventUser->id,'message'=>'Confirmed'];
    }

    /**
     * _userOrganization_: user lists all the users that belong to an organization, besides this you can filter all the users by **any of the properties** that have
     * 
     * 
     * @autenticathed
     * 
     * @queryParam filtered optional filter parameters Example: [{"field":"other_properties.rol","value":["admin"]}]
     * 
     * @urlParam organization_id required organization to which the users belong
     * 
     */
    public function userOrganization(Request $request, String $organization_id, FilterQuery $filterQuery){

        $input = $request->all();

        $query = Account::where("organization_ids", $organization_id);
        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $input);
        return UsersResource::collection($results);          

    }

    /**
     * _changeStatusUser_: approve or reject the rol the users teacher ,and send mail of the change of status of the user to the user who created it
     * 
     * @authenticated
     * @urlParam user_id required id of the user to be rejected or approved 
     * @bodyParam status string required the status update allows for two possible statuses **approved** or **rejected** Example: approved
     * 
     */
    public function changeStatusUser(Request $request , $user_id)
    {   
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $data = $request->json()->all();
        
        $user = Auth::user();

        $userRol =  isset($user) ? $user->others_properties['role'] :  null;
            
        
        if(isset($userRol) && $userRol == 'admin')
        {
            $user = Account::find($user_id);
            $user->status = $data['status'];
            $user->save();
            
            foreach($user->organization_ids  as $organization)
            {
                $organizer = Organization::find($organization);
            }
                              

            Mail::to($user->email)
            ->queue(                
                    new \App\Mail\ConfirmationStatusUserEmail($user , $organizer)
                );

            return $user;
        }
        
        return response()->json([
            'Error' => 'The user does not have the permissions to execute this action'
        ], 403);
        
    }

}