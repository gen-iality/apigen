<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\Auth\Token\Verifier;
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
            $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
            $auth = $firebase->getAuth();
            //Se carga el projectID solo necesario para la libreria Auth
            $projectId = 'eviusauth';
            $verifier = new Verifier($projectId);
            $firebaseToken = $_COOKIE['token']; 
            //Se verifica la valides del token
            $verifiedIdToken = $verifier->verifyIdToken($firebaseToken);
            //Se obtiene la informacion del usuario
            $user = $auth->getUser($verifiedIdToken->getClaim('sub'));
            $request->attributes->add(['user' => $user]);
        }catch(Exception $e){
            abort(403, "asdasdnkasbk.");
        }
        return $next($request);
    }
}
//TEner en cuenta para Enviar mensajes de error
/* } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
    echo $e->getMessage();
} catch (\Firebase\Auth\Token\Exception\IssuedInTheFuture $e) {
    echo $e->getMessage();
} catch (\Firebase\Auth\Token\Exception\InvalidToken $e) {
    echo $e->getMessage(); */