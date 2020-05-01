<?php

namespace App\Extensions;

use App\Account;
use App\Token;
use Firebase\Auth\Token\Exception\ExpiredToken;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Log;

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
        /*
         * Se verifica la valides del token
         * Si este se encuentra activamos la función validator, el cual nos devuelve el
         * usuario
         */
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
            $user = $this->findUserByUID($verifiedIdToken);

            Log::debug("finish auth: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . " ");

        } catch (ExpiredToken | InvalidToken | \InvalidArgumentException $e) {

            /**
             * Decodificación del token
             * Para decodificar utilizamos JWT https://firebase.google.com/docs/auth/admin/verify-id-tokens
             * o puede consultar lo siguiente https://stackoverflow.com/questions/42098150/how-to-verify-firebase-id-token-with-phpjwt
             */
            $token = $e->getToken()->getClaims();
            $user_id = ((array) $token);
            $user_id = $user_id['user_id'];

            /*
             * Capturamos el usuario a partir del uid el cual se encuentra en el token codificado
             * y recuperamos el refresh_token
             */
            $user = Account::where('uid', (string) $user_id)->first();
            $refresh_token = $user->refresh_token;

            if (!$refresh_token) {
                throw new \Exception('Error: Token expired');
            }

            $signInResult = $this->auth->signInWithRefreshToken($refresh_token);

            if (!$signInResult->accessToken()) {
                throw new \Exception('Error: Token expired');
            }

            $token = $signInResult->accessToken();
            $user->token = $token;
            header('new_token:' . $token);

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
}