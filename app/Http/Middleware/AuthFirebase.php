<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Firebase\Auth\Token\Verifier;
use Illuminate\Http\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
            $auth = $firebase->getAuth();
            //Se carga el projectID solo necesario para la libreria Auth
            $projectId = 'eviusauth';
            $verifier = new Verifier($projectId);
/*
            //miramos si el token viene en la Petición
            if (isset($_REQUEST['evius_token'])) {
                $firebaseToken = $_REQUEST['evius_token'];
            } else
            */
            if (isset($_REQUEST['token'])) {
                $firebaseToken = $_REQUEST['token'];
            }

            //miramos si el token viene en una cookie
            /*if (isset($_COOKIE['evius_token'])) {
                $firebaseToken = $_COOKIE['evius_token'];
            } else if (isset($_COOKIE['token'])) {
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
            //Se obtiene la informacion del usuario
            $user = $auth->getUser($verifiedIdToken->getClaim('sub'));
            $request->attributes->add(['user' => $user]);
            return $next($request);
        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
            return response(
                [
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Error: ExpiredToken',
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
