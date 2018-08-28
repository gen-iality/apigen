<?php

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
Route::resource('messageUser', 'MessageUserController');
Route::get('testsendemail', 'TestingController@sendemail');
Route::get('test/{id}', 'EventUserController@test');

//event CRUD
Route::put('event/{id}', 'EventController@update');

//eventUser
Route::get('eventUser/event/{event_id}', 'EventUserController@index');

Route::get('eventUser/{id}',     'EventUserController@show');
Route::post('eventUser',        'EventUserController@store');
Route::put('eventUser/{id}',    'EventUserController@update');
Route::delete('eventUser/{id}', 'EventUserController@destroy');

Route::put('eventUser/{id}/checkin', 'EventUserController@checkIn');
Route::post('eventUser/createUserAndAddtoEvent/{event_id}', 'EventUserController@createUserAndAddtoEvent');



//Event EndPoint
Route::post('user/events/addUserProperties', 'EventController@addUserProperties');
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
//Route::middleware('auth.firebase')->post('user/event_users/create/{id}', 'EventUserController@verifyandcreate');

//Route::middleware('auth.firebase')->post('user/event_users/create', 'EventUserController@store');
Route::middleware('auth.firebase')->post('user/organization_users/create/{id}', 'OrganizationUserController@verifyandcreate');

Route::middleware('auth.firebase')->get('rols', 'RolController@index');
Route::get('states', 'StateController@index');

Route::get('event/{id}/messages', 'MessageController@message');
// Route::get('event/messages', 'MessageController@message');

//Route::post('/import/users/events/{id}', 'EventUserController@createImportedUser');

//RSVP
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@sendEventRSVP');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');
Route::get('rsvp/{id}', 'RSVPController@index');
//Route::get('rsvp/{id}/log', 'RSVPController@log');

//middleware('auth.firebase')->
//Route::get("/testroute/{user}", "EventUserController@testing");

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
