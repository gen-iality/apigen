<?php

namespace App\Http\Controllers;
use Google_Client;
use Google_Service_Analytics;


use Illuminate\Http\Request;

class Oath2Callback extends Controller
{
    function __invoke(){                
        // Start a session to persist credentials.
        session_start();

        // Create the client object and set the authorization configuration
        // from the client_secrets.json you downloaded from the Developers Console.
        $client = new Google_Client();
        $credentials = storage_path('app/analytics/client_secret_460431972981-r4uke7pnlhvd16dvv91k63rav7bii9do.apps.googleusercontent.com.json');
        $client->setAuthConfig($credentials);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/api/oauth2callback');
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

        // Handle authorization flow from the server.
        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            return redirect('/api/oauth2callback')->header('Location' , filter_var($auth_url, FILTER_SANITIZE_URL));            
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            return redirect('/api/oauth2callback')->header('Location' , filter_var($redirect_uri, FILTER_SANITIZE_URL));            
        }
    }
}