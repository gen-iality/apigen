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
Route::get('testsendemail/{id}', 'TestingController@sendemail');
Route::middleware('auth.firebase')->get('test', 'EventUserController@test');

/**
 * This is the routes of event types
 * You can find differents option how get, post, put, deleted
 * 
 */
Route::get('typesEvent', 'TypesEventsController@index');
Route::get('typesEvent/{id}', 'TypesEventsController@show');
//Middleware autentication
Route::middleware('auth.firebase')->get('typesEvent/events/{id}', 'TypesEventsController@show');
Route::middleware('auth.firebase')->post('typesEvent/events', 'TypesEventsController@store');
Route::middleware('auth.firebase')->put('typesEvent/events/{id}', 'TypesEventsController@update');
Route::middleware('auth.firebase')->delete('typesEvent/events/{id}', 'TypesEventsController@delete');


//eventUser
Route::get('eventUser/event/{event_id}', 'EventUserController@index');
Route::get('eventUser/{id}',     'EventUserController@show');
Route::post('eventUser',        'EventUserController@store');
Route::put('eventUser/{id}',    'EventUserController@update');
Route::delete('eventUser/{id}', 'EventUserController@destroy');
Route::put('eventUser/{id}/checkin', 'EventUserController@checkIn');
Route::post('eventUser/createUserAndAddtoEvent/{event_id}', 'EventUserController@createUserAndAddtoEvent');
Route::post('eventUser/bookEventUsers/{event}', 'EventUserController@bookEventUsers');

//Category Public
Route::get('category', 'CategoryController@index');
Route::get('category/{id}', 'CategoryController@show');
//Middleware autentication
Route::middleware('auth.firebase')->get('category/events/{id}', 'CategoryController@show');
Route::middleware('auth.firebase')->post('category/events', 'CategoryController@store');
Route::middleware('auth.firebase')->put('category/events/{id}', 'CategoryController@update');
Route::middleware('auth.firebase')->delete('category/events/{id}', 'CategoryController@delete');

//Events

//Public
Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@show');

Route::put('event/{id}', 'EventController@update');
Route::middleware('auth.firebase')->get('user/events', 'EventController@currentUserindex');
Route::middleware('auth.firebase')->get('user/events/{id}', 'EventController@show');
Route::middleware('auth.firebase')->post('user/events', 'EventController@store');
Route::middleware('auth.firebase')->put('user/events/{id}', 'EventController@update');
Route::middleware('auth.firebase')->delete('user/events/{id}', 'EventController@delete');

//Route::middleware('auth.firebase')->get('permissions/{id}', 'PermissionController@getUserPermissionByEvent');

//User Events Endpoint
Route::post('user/events/{id}/addUserProperty', 'EventController@addUserProperty');
Route::middleware('auth.firebase')->get('user/organizations', 'OrganizationController@index');
Route::middleware('auth.firebase')->post('user/organizations', 'OrganizationController@store');
Route::middleware('auth.firebase')->put('user/organizations/{id}', 'OrganizationController@update');
Route::middleware('auth.firebase')->get('user/organizations/{id}', 'OrganizationController@show');
Route::middleware('auth.firebase')->get('user/organization_users/{id}', 'OrganizationUserController@index');
Route::get('user/event_users/{id}', 'EventUserController@index');

//Route::middleware('auth.firebase')->post('user/event_users/create/{id}', 'EventUserController@verifyandcreate');

//Route::middleware('auth.firebase')->post('user/event_users/create', 'EventUserController@store');
Route::middleware('auth.firebase')->post('user/organization_users/create/{id}', 'OrganizationUserController@verifyandcreate');

Route::middleware('auth.firebase')->get('rols', 'RolController@index');
Route::get('states', 'StateController@index');


// Route::get('event/messages', 'MessageController@message');
//Route::post('/import/users/events/{id}', 'EventUserController@createImportedUser');

//RSVP
Route::get( 'rsvp/test', 'RSVPController@test');
Route::get( 'rsvp/{id}', 'MessageController@show');
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@createAndSendRSVP');
Route::get( 'rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');

Route::get( 'event/{event_id}/rsvp', 'MessageController@indexEvent');


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


