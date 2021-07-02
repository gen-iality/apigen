<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Analytics\Analytics;

// use Google\Auth\ApplicationDefaultCredentials;
use Google_Client;
use Google_Service_Analytics;
// use Google_Service_AnalyticsReporting;

// use Google_Service_Drive;
// use Analytics;
// use Spatie\Analytics\Period;
// use Google_Service_AnalyticsReporting_DateRange;
// use Google_Service_AnalyticsReporting_Metric;
// use Google_Service_AnalyticsReporting_ReportRequest;
// use Google_Service_AnalyticsReporting_GetReportsRequest;
// use Socialite;


class GoogleAnalitycsController extends Controller
{
    public function __invoke(){
            
        // Start a session to persist credentials.
        session_start();

        // Create the client object and set the authorization configuration
        // from the client_secretes.json you downloaded from the developer console.
        $client = new Google_Client();
        $credentials = storage_path('app/analytics/client_secret_460431972981-r4uke7pnlhvd16dvv91k63rav7bii9do.apps.googleusercontent.com.json');
        
        $client->setAuthConfig($credentials);
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

        // If the user has already authorized this app then get an access token
        // else redirect to ask the user to authorize access to Google Analytics.
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        // Set the access token on the client.
        $client->setAccessToken($_SESSION['access_token']);

        // Create an authorized analytics service object.
        $analytics = new Google_Service_Analytics($client);

        // Get the first view (profile) id for the authorized user.
        $profile = $this->getFirstProfileId($analytics);

        // Get the results from the Core Reporting API and print the results.
            $results = $this->getResults($analytics, $profile);
            // printResults($results);
            return  json_encode($results);
        } else {
            
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/api/oauth2callback';
            return redirect('/api/oauth2callback')->header('Location' , filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

        
            
    }
    
    function getFirstProfileId($analytics) {
        // Get the user's first view (profile) ID.
      
        // Get the list of accounts for the authorized user.
        $accounts = $analytics->management_accounts->listManagementAccounts();
      
        if (count($accounts->getItems()) > 0) {
          $items = $accounts->getItems();
          $firstAccountId = $items[0]->getId();
      
          // Get the list of properties for the authorized user.
          $properties = $analytics->management_webproperties
              ->listManagementWebproperties($firstAccountId);
      
          if (count($properties->getItems()) > 0) {
            $items = $properties->getItems();
            $firstPropertyId = $items[0]->getId();
      
            // Get the list of views (profiles) for the authorized user.
            $profiles = $analytics->management_profiles
                ->listManagementProfiles($firstAccountId, $firstPropertyId);
      
            if (count($profiles->getItems()) > 0) {
              $items = $profiles->getItems();
      
              // Return the first view (profile) ID.
              return $items[0]->getId();
      
            } else {
              throw new Exception('No views (profiles) found for this user.');
            }
          } else {
            throw new Exception('No properties found for this user.');
          }
        } else {
          throw new Exception('No accounts found for this user.');
        }
      }
      
      function getResults($analytics, $profileId) {
        // Calls the Core Reporting API and queries for the number of sessions
        // for the last seven days.
        // $algo = $analytics->data_ga->get(
        //   'ga:114494173',
        //   '7daysAgo',
        //   'today',
        //   'ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll');
          // echo '<pre>';
          // print_r($algo);
          // echo '</pre>';
          
        return $analytics->data_ga->get(
            'ga:'.env('VIEW_ID'),
            '7daysAgo',
            'today',
            'ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll');
      }
      
      function printResults($results) {
        // Parses the response from the Core Reporting API and prints
        // the profile name and total sessions.
        if (count($results->getRows()) > 0) {
      
          // Get the profile name.
          $profileName = $results->getProfileInfo()->getProfileName();
      
          // Get the entry for the first entry in the first row.
          $rows = $results->getRows();
          $sessions = $rows[0][0];
          var_dump($results);
          // Print the results.
          // print "<p>First view (profile) found: $profileName</p>";
          // print "<p>Total sessions: $sessions</p>";
        } else {
          print "<p>No results found.</p>";
        }

    }
}