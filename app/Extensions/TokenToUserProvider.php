<?php

namespace App\Extensions;

use App\Token;
use App\Account;
use GuzzleHttp\Client;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Firebase\Auth\Token\Verifier;
use Illuminate\Http\Response;

class TokenToUserProvider implements UserProvider
{
    protected $auth;
    protected $token;
    protected $user;
    protected $id;

    public function __construct(Account $user)
    {
        $this->user = $user;
        $this->auth = resolve('Kreait\Firebase\Auth');
        $this->id = microtime();

    }
    public function retrieveById($identifier)
    {
        return $this->user->find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        //$token = $this->token->with('user')->where($identifier, $token)->first();
        //return $token && $token->user ? $token->user : null;

        /*
         * Se verifica la valides del token
         * Si este se encuentra activamos la función validator, el cual nos devuelve el
         * usuario
         */
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
            $user = $this->findUserByUID($verifiedIdToken);

            Log::debug("finish auth: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . " ");
            
        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
            
            
            /**
             * Se carga el sdk de firebase para PHP
             * Cargamos el json el cual contiene las credenciales para conectarse a firebase
             */

            $firebaseToken = null;
            $json = file_get_contents(base_path('firebase_credentials.json'));
            $data = json_decode($json, true);
            $api_key = $data['api_key'];
         

            /**
             * Decodificación del token
             * Para decodificar utilizamos JWT https://firebase.google.com/docs/auth/admin/verify-id-tokens
             * o puede consultar lo siguiente https://stackoverflow.com/questions/42098150/how-to-verify-firebase-id-token-with-phpjwt
             */
            $token = $e->getToken()->getClaims();
            $user_id = ((array) $token);
            $user_id = $user_id['user_id'];
            
            /**
             * Iniciamos el proyecto de firebase
             * Se carga el projectID solo necesario para la libreria Auth
             */
            $projectId = $data['project_id'];
            $verifier = new Verifier($projectId);
            /*
             * Capturamos el refresh token
             * Capturamos el usuario a partir del uid el cual se encuentra en el token codificado
             * y recuperamos el refresh_token
             */
            $user = Account::where('uid', (string) $user_id)->first();
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

            /**
             * Enviamos los datos a la url
             * Enviamos por metodo post el cuerpo por medio de la url asignada
             */

            $client = new Client();
            
            

            try {
                $response = $client->request('POST', $url, ['form_params' => $body]);  
            } catch (\Exception $e) {
                $r = json_decode($e->getResponse()->getBody()->getContents());
                throw new AuthenticationException($r->error->message);
            }
           
            /**
             * Capturamos el nuevo id_token
             * Capturamos el cuerpo, decodificamos la respuesta y capturamos el id_token
             */
            $token_response = json_decode($response->getBody());
            
            die("debimos haber entrado aqui".$user_id.$refresh_token); 
            /*
             * Se verifica la valides del token
             * Si este se encuentra activamos la función validator, el cual nos devuelve el
             * usuario y finalmente enviamos el request por medio de $next.
             */
            $verifiedIdToken = $verifier->verifyIdToken($token_response->access_token);
            $refresh_token = null;
            $user = self::validator($verifiedIdToken, $refresh_token = null);

            header('new_token:'.$token_response->access_token);

            // throw new AuthenticationException($e->getMessage());
            

        } catch (\Exception $e) {
            Log::debug("bug: " . $e->getMessage());
            throw new AuthenticationException($e->getMessage());
        }

        return $user;

    }
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // update via remember token not necessary
    }
    public function retrieveByCredentials(array $credentials)
    {


        //array(2) { ["email"]=> string(19) "apps@mocionsoft.com" ["password"]=> string(11) "mocion.2040" }

        // implementation upto user.
        // how he wants to implement -
        // let's try to assume that the credentials ['username', 'password'] given
        $user = $this->user;
        $query = get_class($user)::query();
        foreach ($credentials as $credentialKey => $credentialValue) {
            if (strpos($credentialKey, 'password') === false) {
                $query = $query->where($credentialKey, $credentialValue);
                
            }
        }

        return $query->first();

    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $email = $credentials["email"];
        $password = $credentials["password"];
        $userfb = null;
        try {
            $userfb = $this->auth->verifyPassword($email, $password);
            //Kreait\Firebase\Exception\Auth\InvalidPassword
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            //if ($request->expectsJson()) {
            //throw new AuthenticationException($e->getMessage());
            //} else {
            return false;
            //}
        }

        //Cookie::queue("Authorization", 'Bearer ' + $token);
        //Cookie::queue("token", $token);
        return true; 
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
    public function findUserByUID($verifiedIdToken)
    {

        Log::debug("buscando un usuario:" . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));
        $user = Account::where('uid', '=', $user_auth->uid)->first();

        return $user;
    }

    /**
     * Validator
     *
     * Esta función sigue el siguiente proceso
     *
     * 1. Capturamos el usuario autenticado a partir del id token verificado
     * 2. Capturamos los datos del usuario dentro de nuestra base de datos
     * 3. Si no existe el usuario lo crea.
     * 4. Guardamos un nuevo campo llamado refresh_token
     * 5. Guardamos el usaurio y lo retornamos.
     *
     * @param array $verifiedIdToken
     * @param string $refresh_token
     * @return $user
     */
    public function validator($verifiedIdToken, $refresh_token = null)
    {

        try {
            $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));
            $user = Account::where('uid', '=', $user_auth->uid)->first();
            
            if ($refresh_token) {
                $user->refresh_token = $refresh_token;
                $user->save();
            }

        } catch (\Exception $e) {
            
            return response(
                [
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => $e->getMessage(),
                ], Response::HTTP_UNAUTHORIZED
            );
        }
        return $user;
    }

}
