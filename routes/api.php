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
To crate a new API for model please follow this guidelines:
| - the fist part indicating the model must be plural
| - use apiResource to create the CRUD
- use group middleware to restrict access for users and inside again apiResource
- add other methods separated trying to use API estandar and if It get complex create another controller
 */

/* EXAMPLE OF ROUTES PER MODEL using apiResource
Verb        URI                        Action    Route Name
GET            /photos                    index    photos.index
POST           /photos                    store    photos.store
GET            /photos/{photo}            show    photos.show
PUT/PATCH      /photos/{photo}            update    photos.update
DELETE         /photos/{photo}            destroy    photos.destroy
 */

/****************
 * eventUsers
 ****************/
Route::apiResource('eventUsers', 'EventUserController', ['only' => ['index', 'show']]);
Route::group(
    ['middleware' => 'auth.firebase'], function () {
        Route::apiResource('eventUsers', 'EventUserController', ['except' => ['index', 'show']]);
        //Route::get('me/events', 'OrganizationController@meOrganizations');
        Route::get('events/{event_id}/eventUsers', 'EventUserController@indexByEvent');
        Route::put('eventUsers/{id}/withStatus', 'EventUserController@updateWithStatus');
    }
);

Route::put('eventUsers/{id}/checkin', 'EventUserController@checkIn');
Route::post('eventUsers/createUserAndAddtoEvent/{event_id}', 'EventUserController@createUserAndAddtoEvent');
Route::post('eventUsers/bookEventUsers/{event}', 'EventUserController@bookEventUsers');

/****************
 * organizations
 ****************/
Route::apiResource('organizations', 'OrganizationController', ['only' => ['index', 'show']]);
Route::group(
    ['middleware' => 'auth.firebase'], function () {
        Route::apiResource('organizations', 'OrganizationController', ['except' => ['index', 'show']]);
        Route::get('me/organizations', 'OrganizationController@meOrganizations');
        //Route::get('organizations/{id}/users', 'OrganizationUserController@index');
        //Route::post('user/organization_users/create/{id}', 'OrganizationUserController@verifyandcreate');
        Route::get('organizations/{id}/events', 'OrganizationController@OrganizationsEvents');
    }
);


/****************
 * eventTypes
 ****************/
Route::apiResource('eventTypes', 'EventTypesController', ['only' => ['index', 'show']]);
Route::group(
    ['middleware' => 'auth.firebase'], function () {
        Route::apiResource('eventTypes', 'EventTypesController', ['except' => ['index', 'show']]);
    }
);

/****************
 * events
 ****************/
// Este Route::group es un expermimento para detectar a el usuario logueado
// pero sin producir ningun tipo de errores. 
// Route::group( 
//     ['middleware' => 'tokenauth.firebase'], function () {
        Route::apiResource('events', 'EventController', ['only' => ['index', 'show']]);
//     }
// );
Route::group(
    ['middleware' => 'auth.firebase'], function () {
        Route::apiResource('events', 'EventController', ['except' => ['index', 'show']]);
        Route::get('me/events', 'EventController@currentUserindex');

        //this routes should be erased after front migration
        Route::apiResource('user/events', 'EventController', ['except' => ['index', 'show']]);
        Route::middleware('auth.firebase')->get('user/events', 'EventController@currentUserindex');
    }
);

/***************
 * categories
 ****************/
Route::apiResource('categories', 'CategoryController', ['only' => ['index', 'show']]);
Route::group(
    ['middleware' => 'auth.firebase'], function () {
        Route::apiResource('categories', 'CategoryController', ['except' => ['index', 'show']]);
    }
);

/** 
 * *****************
 *    users
 * *****************
 */

 

/* FROM HERE DOWNWARDS UNORGANIZED API ROUTES  WILL DISAPEAR */

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


//Events

//Route::middleware('auth.firebase')->get('permissions/{id}', 'PermissionController@getUserPermissionByEvent');

//User Events Endpoint
Route::post('user/events/{id}/addUserProperty', 'EventController@addUserProperty');
//Route::middleware('auth.firebase')->post('user/event_users/create/{id}', 'EventUserController@verifyandcreate');
//Route::middleware('auth.firebase')->post('user/event_users/create', 'EventUserController@store');

Route::middleware('auth.firebase')->get('rols', 'RolController@index');
Route::get('states', 'StateController@index');

// Route::get('event/messages', 'MessageController@message');
//Route::post('/import/users/events/{id}', 'EventUserController@createImportedUser');

//RSVP
Route::get('rsvp/test', 'RSVPController@test');
Route::get('rsvp/{id}', 'MessageController@show');
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@createAndSendRSVP');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');
Route::get('events/{event_id}/messages', 'MessageController@indexEvent');


//Route::get('rsvp/{id}/log', 'RSVPController@log');

//middleware('auth.firebase')->
//Route::get("/testroute/{user}", "EventUserController@testing");

//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");

//Rol EndPoint
/*
Route::middleware('cors')->get('rols', 'RolController@index');
Route::middleware('cors')->post('rols', 'RolController@store');
Route::middleware('cors')->put('rols/{id}', 'RolController@update');
Route::middleware('cors')->get('rols/{id}', 'RolController@show');

//AttendeTicket EndPoint
Route::middleware('cors')->get('attende_tickets', 'AttendeTicketController@index');
Route::middleware('cors')->post('attende_tickets', 'AttendeTicketController@store');
Route::middleware('cors')->put('attende_tickets/{id}', 'AttendeTicketController@update');
Route::middleware('cors')->get('attende_tickets/{id}', 'AttendeTicketController@show');

 */
