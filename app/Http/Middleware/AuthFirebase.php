<?php

namespace App\Http\Middleware;

use App;
use App\User;
use Closure;
use Firebase\Auth\Token\Verifier;
use Illuminate\Http\Response;

class AuthFirebase
{

    protected $auth;

    public function __construct(\Kreait\Firebase\Auth $auth)
    {
     	$this->auth = $auth;
    }

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

            $json = file_get_contents(base_path('firebase_credentials.json'));
            $data = json_decode($json, true);
            $api_key = $data['api_key'];


            //Se carga el projectID solo necesario para la libreria Auth
            $projectId = 'eviusauth';
            $verifier = new Verifier($projectId);

            //miramos si el token viene en la Petición
            if (isset($_REQUEST['evius_token'])) {
                $firebaseToken = $_REQUEST['evius_token'];
            } elseif (isset($_REQUEST['token'])) {
                $firebaseToken = $_REQUEST['token'];
            }

            //Esta linea llega el refresh token
            // $refresh_token = $_REQUEST['refresh_token'];

            //miramos si el token viene en una cookie
            /*if (isset($_COOKIE['evius_token'])) {
            $firebaseToken = $_COOKIE['evius_token'];
            } elseif (isset($_COOKIE['token'])) {
            $firebaseToken = $_COOKIE['token'];
            }*/

            if (!$firebaseToken) {
                return response(
                    [
                     	'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Error: No token provided',
                    ], Response::HTTP_UNAUTHORIZED
                );
            }
            //Se verifica la valides del token
            $verifiedIdToken = $verifier->verifyIdToken($firebaseToken);

            $user_auth = $this->auth->getUser($verifiedIdToken->getClaim('sub'));
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
            // $url = "https://securetoken.googleapis.com/v1/token?key=".$api_key;
            // //Params sent for refresh_token
            // $body = [ 'grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];
            // //Send params to method POST
            // $client = new Client();
            // $response = $client->request('POST', $url, ['form_params' => $body]);

            return response(
                [
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => 'Error: ExpiredToken',
                    // 'request' => (string) $response->getBody(),
                ], Response::HTTP_UNAUTHORIZED
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
