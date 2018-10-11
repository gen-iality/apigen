<?php

namespace App\Http\Middleware;

use App;
use App\User;
use Closure;
use Firebase\Auth\Token\Verifier;
use Illuminate\Http\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use GuzzleHttp\Client;

class AuthFirebase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {  
        //Se carga el sdk de firebase para PHP
        try {
            $firebaseToken = null;
            $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
            
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

            $api_key = "AIzaSyATmdx489awEXPhT8dhTv4eQzX3JW308vc";

            $auth = $firebase->getAuth();
            //Se carga el projectID solo necesario para la libreria Auth
            $projectId = 'eviusauth';
            $verifier = new Verifier($projectId);
            
            //miramos si el token viene en la Petición
            if (isset($_REQUEST['evius_token'])) {
                $firebaseToken = $_REQUEST['evius_token'];
            } elseif (isset($_REQUEST['token'])) {
                $firebaseToken = $_REQUEST['token'];
            }
            $refresh_token = $_REQUEST['refresh_token'];
            
            //miramos si el token viene en una cookie
            /*if (isset($_COOKIE['evius_token'])) {
            $firebaseToken = $_COOKIE['evius_token'];
            } elseif (isset($_COOKIE['token'])) {
            $firebaseToken = $_COOKIE['token'];
            }*/

            if (!$firebaseToken) {
                return response(
                    [
                        'status' => Response::HTTP_NOT_FOUND,
                        'message' => 'Error: No token provided',
                    ], Response::HTTP_NOT_FOUND
                );
            }
            //Se verifica la valides del token

            $verifiedIdToken = $verifier->verifyIdToken($firebaseToken);

            /* if(false)
            {
                return response("Im here");
            }else{
                return response("ok");
            } */


            //Se obtiene la informacion del usuario
            //Claim sub user_id
            $user_auth = $auth->getUser($verifiedIdToken->getClaim('sub'));
            $user = User::where('uid', '=', $user_auth->uid)->first();

            if (!$user) {
                var_dump("vamos a crearlo");
                $user = User::create(get_object_vars($user_auth));
                $user->save();
            }

            $request->attributes->add(['user' => $user]);

            return $next($request);
        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {

            //API Url
            $url = "https://securetoken.googleapis.com/v1/token?key=".$api_key;
            //Params sent for refresh_token
            $body = [ 'grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];
            //Send params to method POST
            $client = new Client();
            $response = $client->request('POST', $url, ['form_params' => $body]);

            return response(
                [
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Error: ExpiredToken',
                    'request' => (string) $response->getBody(),
                ], Response::HTTP_NOT_FOUND
            );

        }
    }
}
//TEner en cuenta para Enviar mensajes de error
/* } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
echo $e->getMessage();
} catch (\Firebase\Auth\Token\Exception\IssuedInTheFuture $e) {
echo $e->getMessage();
} catch (\Firebase\Auth\Token\Exception\InvalidToken $e) {
echo $e->getMessage(); */
