<?php

namespace App\Http\Middleware;

use \Firebase\JWT\JWT;
use App;
use App\User;
use Closure;
use Firebase\Auth\Token\Verifier;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Storage;


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
            $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));

            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();

            $auth = $firebase->getAuth();

            /**
             * Get Api Key of fiel storage/app/firebase_credentials.json this file
             * This file is difrent to $serviceAccount
             */
            $json = Storage::disk('local')->get('firebase_credentials.json');
            $json = json_decode($json, true);
            $api_key = $json["api_key"];

            //Se carga el projectID solo necesario para la libreria Auth
            $projectId = $json["project_id"];
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
            if (isset($_COOKIE['evius_token'])) {
                $firebaseToken = $_COOKIE['evius_token'];
            } elseif (isset($_COOKIE['token'])) {
                $firebaseToken = $_COOKIE['token'];
            }

            //miramos si el refresh token viene en la Petición
            if (isset($_REQUEST['refresh_token'])) {
                $refresh_token = $_REQUEST['refresh_token'];
            }

            //miramos si el refresh token viene en una cookie
            if (isset($_COOKIE['refresh_token'])) {
                $refresh_token = $_COOKIE['refresh_token'];
            }

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

            //store refresh_tokeb
            if ($refresh_token) {
                $user->refresh_token = $refresh_token;
                $user->save();
            }

            //si el usuario esta en la plataforma de autentificacion pero no en evius lo creamos
            if (!$user) {
                var_dump("vamos a crearlo");
                $user = User::create(get_object_vars($user_auth));
                $user->save();
            }
            $request->attributes->add(['user' => $user]);
            return $next($request);
        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {

            /**
             * REFRESH TOKEN USER
             *
             * Send by post the params 'body' and init new client for refresh token,
             * send information by use GuzzleHttp\Client
             * The refresh token is get only when its use is necessary
             */

            // return response($user);
            try {
                $key="-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC5nccx9xtdoho3\nRi5rtwXuARZ7Z7KdBS7yBMUmseQfMM+8ms11s+JtPiMoAwGPsJCtdWS5JRJzN7jE\n2oqIldCdONu7bZS+8BeCxic/cOHPlHgDnFVWUn/YdBeQgrY0VSsa+aW+vn1r+pir\n43ZOXji8h98iiH4UZQOSHj7sGLn74+juQ+IykIzqKgeef+OihSqKYzXI43S4abWF\nbDdzrwpGvJG5F/voHpNDqHHAM6Aeb7aPfy4IOCcTn8kJkrCYKfq0tOZbazkUZgHm\n/hh+DQrLksdMtnx7ux73TxurEsix2jR24Jetku6iuH2/0iuGJaG+q1vUlGsguq6b\ncxxOYHkpAgMBAAECggEAR9evv8EbEHSrnPVHBl4Cp4o4P291jJzy/K2n+UAlQYVN\nAn0QRRxo6UuBo/z1373BYcHsSFT2/S12EItdz1vdMN1O/w584iJflzhG/KEeZY/b\nm9oolY68+PSGImLVTxAf7QLvihKEzQRjjzQtGEwTvbUBQoZ99jra1PVr+UngwoNd\nZVCXuxdNUkzmf1d9ro+vUMXU0HKE/QBWTQfytJFXndXeEODea+fEVhBM2QUngvx6\nfvMr/W/f5Jv7jh6N+fOZ3IMRhA/73155Opq8evwKo7VGmGMTbOyfqBkaOw+XFj7T\nVvLuKh4Ihl3hGppvyCJhzBqbWjd+PBC997HiM79rOQKBgQDcf8e0tUCrcDo4lCmi\nNGrjBqMVA3iW3qsCe5nUy7wtMC+k+o8Wh15rWYOlCY/YrrYYD8nV4j4/eKkzWMfy\nQBXnqjbCnE+bbTg6RkAkYvxy6cNNCKm5gJrbYvx4elfUxWJjm6hB7nTooqrR3jb8\nkNoUiyDdDtI1bdpSZyH5Em8SlwKBgQDXgD9fFgR8zM/jlfQHCSqW9MrUeI/FAh7n\n3hmEqWbIBhXL/1uhFgFo82bqNbiqJbVn4qf5Az1y5Md48mP2jYLUH/CBNaLkm6uQ\nRWhR5+l6wiRPW2LuYKx61law9Fw5uS4bMreWRAzmh04/OSaniNzCcXFZzm3vVwwZ\ngqeMa1cKPwKBgDnVFecSpwyQGeUfDzBo+SPkaL+pMma3rjivfHBwo0Fi4wwtX3w0\nMxKK3tlZga3+XOpAsdp0RYlWN2KtRXwHTPd/EG/ImaSVZ+r44/fnMnldUIkS3Zk2\n3ubttnRO+lxnDOA9QktQpL8jcxQqaVejEl/TAeKY8Y9r6Zg1TpbKO/GvAoGAVC6c\nEsfmDt5vI0dToV/6TCfqB9/kwZ/XdNo0+7a1GNQPtbXWFHIlMNtMS5eawJSkbaWD\n2mlimrw2E9AULp8PCVBEwiSysj0BYwVKABzo/vRR/NIFLnuDRSTvjoaWdFIbabKB\nNuj0ZSVb8qSfrfhvzGFGVz+lgEZvypNYYikYQj8CgYAYqU2v3EjSMiWpGBRq6kzm\n34hc/+Mxv/r4x1NgJJq3savtsjPzSZQPOFTIoywZmE3gagkv+/STDcHLomz5KSKE\n8bzSUblJOcM6wYYtXd67H4Hzv6COuWwhbTz2/mhTJCgS77DxywsuJxvahEOsr1nA\n39a0NvQKDp/I+bHiLvNQ3g==\n-----END PRIVATE KEY-----\n";
                $decoded = JWT::decode($firebaseToken, $key, array('RS256'));
                return 0;
            } catch (\Exception $e) { // Also tried JwtException
                echo 'error';
                return response($e);
            }
            

            
            $url = "https://securetoken.googleapis.com/v1/token?key=" . $api_key;
            $body = ['grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];
            $client = new Client();
            $response = $client->request('POST', $url, ['form_params' => $body]);


            $user = User::where('refresh_token', '=', $refresh_token)->first();
            $request->attributes->add(['user' => $user]);
            return $next($request);


            // return response(
            //     [
            //         'status' => Response::HTTP_UNAUTHORIZED,
            //         'message' => 'Error: ExpiredToken',
            //         'user' => $user,
            //         'request' => (string) $response->getBody(),
            //     ], Response::HTTP_UNAUTHORIZED
            // );

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
