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
use GuzzleHttp\Client;

class UserController extends Controller
{

    protected $auth;

    public function __construct(\Kreait\Firebase\Auth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * El sigue el siguiente proceso para enviar la informacón a partir del token
     * 1. Carga las credenciales de firebase.
     * 2. Carga el token del usaurio si no existe token avisa directamente al usuario
     * 3. Verifica el token
     *      3.1 si lo encuentra va a la función del validador el cual gurda el refresh_token
     *      y retorna el usuario
     *      3.2 si no lo encuentra se dirije al catch el cual envia  por metodo POST
     *      La url que contiene el api_key y el cuerpo, el cual contiene el refresh token
     *      del usuario(siempre es el mismo para el usuario) y la palabra refresh_token, para
     *      indicar que se va a refrescar el token y generar un nuevo token ID.
     *      3.4 Capturamos el nuevo id, verificamos la información y volvemos a ejecutar
     *      la funcion validador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function storeRefreshToken(Request $request)
    {

        try {
            /**
             * Se carga el sdk de firebase para PHP
             * Cargamos el json el cual contiene las credenciales para conectarse a firebase
             */
            //
            $firebaseToken = null;
            $json = file_get_contents(base_path('firebase_credentials.json'));
            $data = json_decode($json, true);
            $api_key = $data['api_key'];
            /**
             * Iniciamos el proyecto de firebase
             * Se carga el projectID solo necesario para la libreria Auth
             */
            $projectId = $data['project_id'];
            $verifier = new Verifier($projectId);
            /**
             * Miramos si el token viene en la Petición
             * El token viene en la petición el cual si llega con el nombre evius_token o token
             * REQUEST,
             *
             * En la Petición viene el refresh_token
             */
            //
            if ($request->has('evius_token')) { $firebaseToken = $request->input('evius_token');}
            $refresh_token = json_decode(file_get_contents('php://input'))->refresh_token;
    
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
            $verifiedIdToken = $verifier->verifyIdToken($firebaseToken);
            $user = self::validator($verifiedIdToken, $refresh_token);
            $request->attributes->add(['user' => $user]);
            return response($request);


        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
            /**
             * Decodificación del token
             * Para decodificar utilizamos JWT https://firebase.google.com/docs/auth/admin/verify-id-tokens
             * o puede consultar lo siguiente https://stackoverflow.com/questions/42098150/how-to-verify-firebase-id-token-with-phpjwt
             */
            $token = $e->getToken()->getClaims();
            $user_id = ((array) $token)['user_id'];
            /*
             * Capturamos el refresh token
             * Capturamos el usuario a partir del correo el cual se encuentra en el token codificado
             * y recuperamos el refresh_token
             */
            $user = User::where('uid', (string) $user_id)->first();
            // var_dump($user);
            $refresh_token = $user->refresh_token;

            if (!$refresh_token) {
                return response(
                    [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Error: Token expired',
                    ], Response::HTTP_UNAUTHORIZED
                );
            }

            // return response($refresh_token);
            /**
             * Generamos la URL a partir del api_key
             * Esta url sirve para poder generar el nuevo token id,
             * pero mas adelante se debe enviar el cuerpo
             */
            $url = "https://securetoken.googleapis.com/v1/token?key=" . $api_key;
            /**
             * Generamos el cuerpo indicando
             * el valor del refresh_token, e indicacndo que  el token se va a refrescar
             */
            $body = ['grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];

            // // var_dump($url);
            // return response($url);
            // return response("ok");
            /**
             * Enviamos los datos a la url
             * Enviamos por metodo post el cuerpo por medio de la url asignada
             */
            $client = new Client();
            try {
                $response = $client->request('POST', $url, ['form_params' => $body]);
            } catch (RequestException $e) {
                return response($e->getResponse());
            }
            /**
             * Capturamos el nuevo id_token
             * Capturamos el cuerpo, decodificamos la respuesta y capturamos el id_token
             */
            $token_response = json_decode($response->getBody());
            /*
             * Se verifica la valides del token
             * Si este se encuentra activamos la función validator, el cual nos devuelve el
             * usuario y finalmente enviamos el request por medio de $next.
             */
            $verifiedIdToken = $verifier->verifyIdToken($token_response->access_token);

            $refresh_token = null;
            $user = self::validator($verifiedIdToken, $refresh_token = null);

            $request->attributes->add(['user' => $user]);

            return response($request);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Validator
     *
     * Esta función sigue el siguiente proceso
     *
     * 1. Capturamos el usuario autenticado a partir del id token verificado
     * 2. Capturamos los datos del usuario dentro de nuestra base de datos
     * 3. Si no existe el usuario lo crea.
     * 4. Guardamos un nuevo camo llamado refresh_token
     * 5. Guardamos el usaurio y lo retornamos.
     *
     * @param array $verifiedIdToken
     * @param string $refresh_token
     * @return $user
     */
    public function validator($verifiedIdToken, $refresh_token = null)
    {
        $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));
        $user = User::where('uid', '=', $user_auth->uid)->first();
        if (!$user) {
            var_dump("vamos a crearlo");
            $user = User::create(get_object_vars($user_auth));
        }
        if ($refresh_token) {
            $user->refresh_token = $refresh_token;
            $user->save();
        }
        return $user;
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
}
