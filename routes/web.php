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

require (__DIR__ . '/attendize/attendize.php');


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


Route::post('testpush', 'SendContentController@sendPushNotification');