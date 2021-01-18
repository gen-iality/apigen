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

/**
 * @group User
 * 
 * Manage users, the users info are stored in the backend and the user auth info (password, email, sms login) is stored in firebase auth. firebaseauth user and backend user are connected thought the uid field generated in firebaseauth.
 *
 * El manejo de la sessión (si un usuario ingreso al sistema) se maneja usando tokens JWT generados por firebase se maneja un token en la url que se vence cada media hora y un refresh_token almacenado en el usuario para refrescar el token que se pasa por la URL.
 *
 * Del token en la url se extrae la información del usuario se pasa de esta manera ?token=xxxxxxxxxxxxxxxxx
 */
class UserController extends UserControllerWeb
{

    protected $auth;

    public function __construct(\Kreait\Firebase\Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * _index_: It's not posible to query all users in the platform.
     *
     * Doesn't make sense to query all users. Users main function is to assits to an event
     * thus make sense to query users going to an event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(["data" => "Can't query all users of the platform maximun scope is by event, please query particular user by _id or findByEmail"]);
        /*return UsersResource::collection(
    Account::paginate(config('app.page_size'))
    );*/
    }

    /**
     * _show_: registered User
     *
     * @urlParam user required  id of user. Example: 5e9caaa1d74d5c2f6a02a3c2
     *
     *
     */
    public function show(String $id)
    {
        //
        $Account = Account::findOrFail($id);
        $response = new UsersResource($Account);
        return $response;
    }

    /**
     * _store_: create new user SignUp
     * 
     * 
     * @bodyParam email email required Example: evius@evius.co
     * @bodyParam names  string required  person name
     * @bodyParam picture  string optional. Example: http://www.gravatar.com/avatar
     * @bodyParam password  string  optional if not provided a default evius.2040 password is assigned
     * @bodyParam others_properties array  dynamic properties of the user you want to place Example:[]
     * @bodyParam organization_ids array organizations to which the user belongs, in order to access their events Example: ["5f7e33ba3abc2119442e83e8" , "5e9caaa1d74d5c2f6a02a3c3"]["5f7e33ba3abc2119442e83e8" , "5e9caaa1d74d5c2f6a02a3c3"]
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $validatedData = $request->validate([
            'email' => 'required|unique:users|email',
            'names' => 'required',
            'picture' => 'string',
            'password' => 'string|min:6',
            'others_properties' => 'array',
        ]);

        $data = $request->json()->all();
       
        //For users registered as teachers, the status is set to 'unconfirmed' and then confirmed by the administrator
        $data['status'] = ($data['others_properties']['role'] == 'teacher') ? 'unconfirmed' : 'confirmed';        

        $result = new Account($data);

        $result->save();
        if(isset($data['organization_ids'])){
            $result->organizations()->attach($data['organization_ids']);
        }               

        Mail::to($result->email)
        ->queue(            
            new \App\Mail\UserRegistrationMail($result)
        );
        
        $result = Account::find($result->_id);
        return $result;
    }



    /**
     * _update_: update registered user
     * @authenticated
     * @urlParam user required id user. Example: 5e9caaa1d74d5c2f6a02a3c2
     *
     * @bodyParam email email optional. Example: evius@evius.co
     * @bodyParam names  string optional. Example: evius lopez
     * @bodyParam picture  string optional. Example: http://www.gravatar.com/avatar
     * @bodyParam organization_ids string. 
     * @bodyParam others_properties array optional dynamic properties of the user you want to place. Example: []
     * @return App\Http\Resources\UsersResource
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'email' => 'email',
            'names' => 'string',
            'picture' => 'string',
            'password' => 'string',
            'others_properties' => 'array',
        ]);

        $data = $request->json()->all();
        
        $auth = resolve('Kreait\Firebase\Auth');
        $Account = Account::find($id);
        
        //If the user wants to change the password this will also be modified in firebase
        if(isset($data['password']))
        {           
            $auth->changeUserPassword($Account['uid'], $data['password']);
        }

        $Account->fill($data);
        $Account->save();

        if(isset($data['organization_ids'])){
            $Account->organizations()->sync($data['organization_ids']);
        }     

        $Account = Account::find($Account->_id);

        return $Account;
    }

    /**
     * _delete_: dele a registered user
     * @authenticated
     * @urlParam id required id user
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
     * _signInWithEmailAndPassword_: login a user
     *
     * @bodyParam email email required Example: evius@evius.co
     * @bodyParam password string required Example: evius.2040
     * It returns the userdata and inside that data
     * the initial_token to be stored in front and be used in following api request
     *
     * @param Request $request
     * @return void
     */
    public function signInWithEmailAndPassword(Request $request)
    {

        $data = $request->json()->all();

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $data['email'];
        $pass = $data['password'];

        $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
        $uid = $signInResult->firebaseUserId();

        $user = Account::where('uid', $uid)->first();
        $user->refresh_token = $signInResult->refreshToken();
        $user->save();
        $user->initial_token = $signInResult->idToken();

        return $user;
    }

    /**
     * _findByEmail_: search for specific user by mail
     *
     * @urlParam email required email del usuario buscado. Example: evius@evius.co
     *
     * @param  email  $email
     * @return \Illuminate\Http\Response
     */
    public function findByEmail($email)
    {
        try {
            $Account = Account::where('email', '=', $email)
                ->get(['id', 'email', 'names', 'name', 'Nombres', 'displayName']);
            $response = new UsersResource($Account);

        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
        return $Account;
    }

    /**
     * loginorcreatefromtoken: create a user from auth data.
     * 
     * If a userauth is created  in frontend using firebaseatuh javascript JDK
     * this method can be called to create respective user in the backend
     * data is extracted from the token.
     * 
     * authuser in firebaseauth and user are related by the field uid created by firebase
     *
     * @urlParam token required auth token used to extract the user info
     * @urlParam destination optional url to redirect after user is created
     * @param  \Illuminate\Http\Request  $request
     * @return  redirect to evius front
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
     * _sendConfirmationEmail_: sending of mail confirmation.
     *
     * @urlParam id required id user
     *
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
     * _confirmEmail_: get email confirmation
     *
     * @urlParam id required id user
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
     * @queryParam filtered optional filter parameters Example: [{"field":"others_properties.role","value":["admin"]}]
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
}


