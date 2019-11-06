<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Order;
use App\Models  ;
require (__DIR__ . '/attendize/attendize.php');

Route::group(['middleware'=>['web']],function(){

    Route::get('testsendemail', 'TestingController@sendemail');

    Route::get('test', 'EventController@index');
    
    Route::get('/rsvptemplate', function () {
    
        $event = new App\Event();
        $event->name="event best";
        $event->venue    ="venue";
        $event->location ="location";
        $event->description ="description";
    
        $eventUser = new App\Attendee();
        $eventUser->name ="odiseo";
        $eventUser->email ="odiseo@iliada.com";


    
        return new App\Mail\RSVP("message", $event, $eventUser, null, "footer", "subject");
    });
});


    Route::get('/trm',function(){            
        $comoeslaTRM = file_get_contents('https://dolarhoy.com.co/dolar-ayer/');
        $TRMsingle = explode("1 Dólar ayer en Colombia ",$comoeslaTRM);
        foreach($TRMsingle as $unasola){
            if (strpos($unasola,"$")){
               $trmactual = substr($unasola,1,8);
               
               break;
            }
        }
        $trmactual = str_replace(".","",$trmactual);
        $trmactual = str_replace(",",".",$trmactual);
       echo $trmactual;        
    });


    Route::get('/crear_tickets',"EventAttendeesController@postImportAttendee");