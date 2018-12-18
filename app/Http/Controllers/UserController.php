<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
use GuzzleHttp\Client;

class UserController extends Controller
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
            
            $user = User::where('uid', '=', $user_auth->uid)->first();
            
            if(!$user){
                $user = User::create(get_object_vars($user_auth));
            }
 
            return redirect('https://evius.co/?token='.$firebaseToken);
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
        
        if(isset($data['phoneNumber']) && isset($data['picture'])){
            $data['profile_completed'] = ($data['phoneNumber'] != "" && $data['picture'] != "") ? true : false;
        }else{
            $data['profile_completed'] = false;
        }
    
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

    /**
     * Find the specified resource from storage.
     * by email.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function findByEmail($email)
    {
        $User = User::where('email','=', $email)->get(['id','email','names','name','Nombres','displayName']);
        $response = new UsersResource($User);
        return $User;
    }
}
