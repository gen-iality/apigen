<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Account;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Firebase\Auth\Token\Verifier;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Event;
use App\Attendee;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\State;
use Illuminate\Http\Response;
use Validator;
use Storage;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\web\UserController as UserControllerWeb;

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


    public function loginorcreatefromtoken(Request $request){
            /**
             * Miramos si el token viene en la Petición
             * El token viene en la petición el cual si llega con el nombre evius_token o token
             * REQUEST,
             *
             * En la Petición viene el refresh_token
             */
            //
            $firebaseToken = null;
            if ($request->has('evius_token')) { $firebaseToken = $request->input('evius_token');}

            if ($request->has('destination')) { $destination = $request->input('destination');}
    
            /**
             * Si el token no viene en la petición
             * Bota el error de que el token no fue enviado en la petición, recordar que esta ruta es
             * una petición GET.
             */
            if (!$firebaseToken) {
                return response(
                    [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Error: No token provided',
                    ], Response::HTTP_UNAUTHORIZED
                );
            }
            /*
             * Se verifica la valides del token
             * Si este se encuentra activamos la función validator, el cual nos devuelve el
             * usuario y finalmente enviamos el request indicando que se puede continuar, con la página acutal.
             */

            $verifiedIdToken = $this->auth->verifyIdToken($firebaseToken);
            $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));
            
            $user = Account::where('uid', '=', $user_auth->uid)->first();
            
            if(!$user){
                $user = Account::create(get_object_vars($user_auth));
                //We created a organization default, thus the name organitatios is the displayName user
		        $organization = new Organization();
                $organization->author =  $user->id;
                $organization->name = $user->displayName;
                $organization->save();
            }
            
            self::_sendConfirmationEmail(
                $user
            );
            if($destination){
                return redirect($destination.'/?token='.$firebaseToken);
            }else{
                return redirect('https://evius.co/?token='.$firebaseToken);
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
        
        if(isset($data['phoneNumber']) && isset($data['picture'])){
            $data['profile_completed'] = ($data['phoneNumber'] != "" && $data['picture'] != "") ? true : false;
        }else{
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
    public function findByEmail($email)
    {
        $Account = Account::where('email','=', $email)->get(['id','email','names','name','Nombres','displayName']);
        $response = new UsersResource($Account);
        return $Account;
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

            Mail::to($email)
                ->queue(
                    new ConfirmationEmail($user)
                );
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

        return redirect()->away(Config::get('app.front_url', 'https://evius.co') . '/profile/' . $user->id);
        // return ['id'=>$eventUser->id,'message'=>'Confirmed'];

    }

}
