<?php

use Illuminate\Http\Request;
use App\Event;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('testsendemail', 'TestingController@sendemail');
Route::get('test', 'EventController@test');

//Event EndPoint
Route::middleware('auth.firebase')->get('user/events', 'EventController@index');
Route::middleware('auth.firebase')->get('user/events/{id}', 'EventController@show');
Route::middleware('auth.firebase')->post('user/events', 'EventController@store');
Route::middleware('auth.firebase')->put('user/events/{id}', 'EventController@update');
Route::middleware('auth.firebase')->delete('user/events/{id}', 'EventController@delete');

//Route::middleware('auth.firebase')->get('permissions/{id}', 'PermissionController@getUserPermissionByEvent');

//User Events Endpoint
Route::middleware('auth.firebase')->get('user/organizations', 'OrganizationController@index');
Route::middleware('auth.firebase')->post('user/organizations', 'OrganizationController@store');
Route::middleware('auth.firebase')->put('user/organizations/{id}', 'OrganizationController@update');
Route::middleware('auth.firebase')->get('user/organizations/{id}', 'OrganizationController@show');

Route::middleware('auth.firebase')->get('user/organization_users/{id}', 'OrganizationUserController@index');

Route::middleware('auth.firebase')->get('user/event_users/{id}', 'EventUserController@index');
Route::middleware('auth.firebase')->post('user/event_users/create/{id}', 'EventUserController@verifyandcreate');

//Route::middleware('auth.firebase')->post('user/event_users/create', 'EventUserController@store');
Route::middleware('auth.firebase')->post('user/organization_users/create/{id}', 'OrganizationUserController@verifyandcreate');

Route::middleware('auth.firebase')->get('rols', 'RolController@index');
Route::get('states', 'StateController@index');

Route::post('/import/users/events/{id}', 'EventUserController@createImportedUser');

//RSVP
Route::get('rsvp/sendeventrsvp/{event}/{state?}', 'RSVPController@sendEventRSVP');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');

//middleware('auth.firebase')->
Route::get("/testroute/{user}", "EventUserController@testing");


//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");

//Route::middleware('cors')->post('organization_users', 'OrganizationUserController@store');



//Organization EndPoint
/* Route::middleware('cors')->get('organizations', 'OrganizationController@index');
Route::middleware('cors')->post('organizations', 'OrganizationController@store');
Route::middleware('cors')->put('organizations/{id}', 'OrganizationController@update');
Route::middleware('cors')->get('organizations/{id}', 'OrganizationController@show');


//OrganizationUser EndPoint
Route::middleware('cors')->get('organization_users', 'OrganizationUserController@index');
Route::middleware('cors')->post('organization_users', 'OrganizationUserController@store');
Route::middleware('cors')->put('organization_users/{id}', 'OrganizationUserController@update');
Route::middleware('cors')->get('organization_users/{id}', 'OrganizationUserController@show');


//Rol EndPoint
Route::middleware('cors')->get('rols', 'RolController@index');
Route::middleware('cors')->post('rols', 'RolController@store');
Route::middleware('cors')->put('rols/{id}', 'RolController@update');
Route::middleware('cors')->get('rols/{id}', 'RolController@show');


//AttendeTicket EndPoint
Route::middleware('cors')->get('attende_tickets', 'AttendeTicketController@index');
Route::middleware('cors')->post('attende_tickets', 'AttendeTicketController@store');
Route::middleware('cors')->put('attende_tickets/{id}', 'AttendeTicketController@update');
Route::middleware('cors')->get('attende_tickets/{id}', 'AttendeTicketController@show'); */



/**
 * End-Point 
 * Publics
 */
Route::get('events', 'EventController@publicEvents');
Route::get('event/{id}', 'EventController@getOnePublicEvent');


