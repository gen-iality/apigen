<?php

include ("attendize/schedule.php");
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

/* EXAMPLE OF ROUTES PER MODEL using apiResourcelogin   
Verb           URI                        Action     Route Name
GET            /photos                    index      photos.index
POST           /photos                    store      photos.store
GET            /photos/{photo}            show       photos.show
PUT/PATCH      /photos/{photo}            update     photos.update
DELETE         /photos/{photo}            destroy    photos.destroy
 */

Route::get('test/auth', 'TestingController@auth');
Route::get('test/Gateway', 'TestingController@Gateway');
Route::get('test/request/{refresh_token}', 'TestingController@request');
Route::get('test/error', 'TestingController@error');
Route::get('test/users', 'TestingController@users');
Route::get('test/permissions', 'TestingController@permissions');
Route::get('test/orderSave/{order_id}', 'TestingController@orderSave');
Route::get('test/ticket/{ticket_id}/order/{order_id}', 'ApiOrdersController@deleteAttendee');
// Route::get('test/roles/', 'ContributorController@index');

Route::get('generatorQr/{id}', 'GenerateQr@index');
Route::get('sync/firestore/{event_id}', 'synchronizationController@EventUsers');
Route::get('sync/firestore/{id}', 'synchronizationController@Attendee');
Route::get('sync/firebase/{id}', 'synchronizationController@EventUserRDT');

Route::put('events/{id}/updatestyles', 'EventController@updateStyles');

/****************
 * eventUsers
 ****************/

 
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('eventUsers', 'EventUserController', ['except' => ['index', 'show']]);
        //Route::get('me/events', 'OrganizationController@meOrganizations');
        Route::get('events/{event_id}/eventUsers', 'EventUserController@indexByEvent');
        Route::put('eventUsers/{id}/withStatus', 'EventUserController@updateWithStatus');
    }
);

Route::put ('eventUsers/{id}/checkin', 'EventUserController@checkIn');
Route::post('eventUsers/createUserAndAddtoEvent/{event_id}', 'EventUserController@createUserAndAddtoEvent');
Route::post('eventUsers/bookEventUsers/{event}', 'EventUserController@bookEventUsers');
Route::put ('users/verifyAccount/{uid}', 'UserController@VerifyAccount');
Route::post('events/{event_id}/eventusers',      'EventUserController@createUserAndAddtoEvent');
Route::get ('events/{event_id}/eventusers',      'EventUserController@index');
Route::get ('events/{event_id}/eventusers/{id}', 'EventUserController@show');
Route::put ('events/withstatus/{id}', 'EventUserController@updateWithStatus');

Route::post('events/{event_id}/eventusersbyurl',      'EventUserController@createUserViaUrl');
//Route::get ('events/{event_id}/asdasddelete',      'EventUserController@destroyAll');
Route::post ('events/{event_id}/sendemailtoallusers',      'EventUserController@sendQrToUsers');

 
/***************
 * USER PROPERTIES
 ****************/
Route::get   ('events/{event_id}/userproperties',      'UserPropertiesController@index');
Route::post  ('events/{event_id}/userproperties',      'UserPropertiesController@store');
Route::get   ('events/{event_id}/userproperties/{id}', 'UserPropertiesController@show');
Route::put   ('events/{event_id}/userproperties/{id}', 'UserPropertiesController@update');
Route::delete('events/{event_id}/userproperties/{id}', 'UserPropertiesController@destroy');


/****************
 * organizations
 ****************/
Route::apiResource('organizations', 'OrganizationController', ['only' => ['index', 'show']]);

Route::post('organizations/{id}/addUserProperty', 'OrganizationController@addUserProperty');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('organizations', 'OrganizationController', ['except' => ['index', 'show']]);
        Route::get('me/organizations', 'OrganizationController@meOrganizations');
        // Route::get('organizations/{id}/users', 'OrganizationUserController@store');
        // Route::post('organization_users/{id}', 'OrganizationUserController@verifyandcreate');
    }
);

/***************
 * SENDCONTENT 
 ****************/

Route::post('events/sendMecPerfil' ,  'SendContentController@sendContentGenerated');
Route::post('events/sendMecPerfilMec' ,  'SendContentController@sendContentMec');
Route::post('events/sendMecPerfilMectoall' ,  'SendContentController@sendContentToAll');
Route::post('events/sendnotificationemail' ,  'SendContentController@sendNotificationEmail');

Route::get('events/{event_id}/sendcontent' ,        'SendContentController@index');
Route::post('events/{event_id}/sendcontent' ,       'SendContentController@store');
Route::get('events/{event_id}/sendcontent/{id}' ,   'SendContentController@show');
Route::put('events/{event_id}/sendcontent/{id}' ,   'SendContentController@update');
Route::delete('events/{event_id}/sendcontent/{id}', 'SendContentController@destroy');

/***************
 * INVITATION 
 ****************/

Route::get('events/{event_id}/invitation' , 'InvitationController@index');
Route::post('events/{event_id}/sendinvitation' , "InvitationController@SendInvitation");
Route::post('events/{event_id}/invitation' , 'InvitationController@store');
Route::get('events/{event_id}/invitation/{id}' , 'InvitationController@show');
Route::put('events/{event_id}/invitation/{id}' , 'InvitationController@update');
Route::delete('events/{event_id}/invitation/{id}', 'InvitationController@destroy');


/****************
 * Users Organization
 ****************/
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('organizations/{organization_id}/users', 'OrganizationUserController',['except' => ['update']]);
        Route::middleware('auth:token')->get('user/organizationUser/{organization_id}', 'OrganizationUserController@currentUserindex');
        Route::put('organizations/{organization_id}/user/{organization_user_id}', 'OrganizationUserController@update');
    }
);


/****************
 * Users
 ****************/

Route::get('user/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
Route::apiResource('users', 'UserController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::put("me/storeRefreshToken", "UserController@storeRefreshToken");
        Route::apiResource('users', 'UserController', ['except' => ['index', 'show']]);
        Route::get('users/findByEmail/{email}', 'UserController@findrequireByEmail');
        Route::get('me/eventUsers', 'EventUserController@meEvents');
    }
);

/****************
 * events
 ****************/
// Este Route::group es un expermimento para detectar a el usuario logueado
// pero sin producir ningun tipo de errores.
// Route::group(
//     ['middleware' => 'tokenauth:token'], function () {
Route::apiResource('events', 'EventController');
//Route::get("eventsearch",'EventController');
//     }
// );

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('events', 'EventController', ['except' => ['index', 'show']]);
        Route::get('me/events', 'EventController@currentUserindex');
        //this routes should be erased after front migration
        Route::apiResource('user/events', 'EventController', ['except' => ['index', 'show']]);
        Route::middleware('auth:token')->get('user/events', 'EventController@currentUserindex');
    }
);

Route::get('eventsbeforetoday','EventController@beforeToday');
Route::get('users/{id}/events', 'EventController@EventbyUsers');
Route::get('organizations/{id}/events', 'EventController@EventbyOrganizations');

/***************
 * categories
 ****************/
Route::apiResource('categories', 'CategoryController', ['only' => ['index', 'show']]);
Route::group(
    ['middleware' => 'auth:token'], function () {  
        Route::apiResource('categories', 'CategoryController', ['except' => ['index', 'show']]);
    }
);



Route::group(
   ['middleware' => 'auth:token'], function () {
        Route::apiResource('certificates', 'CertificateController', ['except' => ['index', 'show']]);
        Route::delete('certificates/{id}', 'CertificateController@destroy');
    }
);

/***************
 * RolesAttendees
 ****************/


Route::get      ('events/{event_id}/rolesattendees' , 'RoleAttendeeController@indexByEvent');
Route::post     ('events/{event_id}/rolesattendees' , 'RoleAttendeeController@store');
Route::get      ('events/{event_id}/rolesattendees/{id}' , 'RoleAttendeeController@show');
Route::put      ('events/{event_id}/rolesattendees/{id}' , 'RoleAttendeeController@update');
Route::delete   ('events/{event_id}/rolesattendees/{id}', 'RoleAttendeeController@destroy');

/***************
 * CERTIFICATES
 ****************/

Route::post('generatecertificate',"CertificateController@generateCertificate");
Route::get      ('events/{event_id}/certificates' ,      'CertificateController@indexByEvent');
Route::post     ('events/{event_id}/certificates' ,      'CertificateController@store');
Route::get      ('events/{event_id}/certificates/{id}' , 'CertificateController@show');
Route::put      ('events/{event_id}/certificates/{id}' , 'CertificateController@update');
Route::delete   ('events/{event_id}/certificates/{id}',  'CertificateController@destroy');



//Route::get('rolesattendees/{id}', 'RoleAttendeeController@index');
Route::apiResource('rolesattendees', 'RoleAttendeeController', ['only' => ['index', 'show']]);
//Route::get('events/{event_id}/rolesattendees', 'RoleAttendeeController@indexByEvent');

Route::group(
   ['middleware' => 'auth:token'], function () {
        Route::apiResource('rolesattendees', 'RoleAttendeeController', ['except' => ['index', 'show']]);
        Route::delete('rolesattendees/{id}', 'RoleAttendeeController@destroy');
    }
);

/****************
 * eventTypes
 ****************/
Route::apiResource('eventTypes', 'EventTypesController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('eventTypes', 'EventTypesController', ['except' => ['index', 'show']]);
    }
);


/****************
 * eventContents
 ****************/
Route::apiResource('eventContents', 'EventContentsController');

// Route::group(
//     ['middleware' => 'auth:token'], function () {
//         Route::apiResource('eventTypes', 'EventTypesController', ['except' => ['index', 'show']]);
//     }
// );

/****************
 * Escarapelas
 ****************/
Route::apiResource('escarapelas', 'EscarapelaController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('escarapelas', 'EscarapelaController', ['except' => ['index', 'show']]);
    }
);

/****************
 * Contributors = STAFF 
 ****************/
Route::group(
    ['middleware' => 'auth:token'], function () {

        //no sabemos como anteponerle el evento al apiresource lo deshabilitamos    
        //Route::apiResource('contributors', 'ContributorController', ['except' => ['index']]);
        Route::get   ('events/{event_id}/contributors', 'ContributorController@index');
        Route::post  ('events/{event_id}/contributors', 'ContributorController@store');
        Route::get   ('events/{event_id}/contributors/{id}', 'ContributorController@show');
        Route::put   ('events/{event_id}/contributors/{id}', 'ContributorController@update');
        Route::delete('events/{event_id}/contributors/{id}', 'ContributorController@destroy');

        //Carga los roles 
        Route::get('contributors/metadata/roles', 'ContributorController@metadata_roles');

        //Para cargar informaci�n de contributor del usuario actual
        Route::get('contributors/events/{event_id}/me', 'ContributorController@meAsContributor');    
        Route::get('me/contributors/events', 'ContributorController@myEvents');
        
        //esto hace lo mismo que una ruta de arriba cual dejamos?
        Route::get('contributors/events/{event_id}', 'ContributorController@index');
    }
);
        
        

/****************
 * Contributors
 ****************/
//Route::group(
    //['middleware' => 'auth:token'], function () {
        Route::apiResource('ticket', 'API\EventTicketsAPIController',['except' => ['index']]);
        Route::get('ticket/event/{event_id}', 'API\EventTicketsAPIController@index');

   // }
//);

/****************
 * Speakers
 ****************/
// Route::group(
    // ['middleware' => 'auth:token'], function () {
        Route::apiResource('events/{event_id}/speakers', 'SpeakerController');
    // }
// );

/****************
 * Event Sessions
 ****************/
// Route::group(
    // ['middleware' => 'auth:token'], function () {
        Route::apiResource('events/{event_id}/sessions', 'EventSessionController');
    // }
// );

/****************
 * Orders Events
 ****************/
// Route::group(
//     ['middleware' => 'auth:token'], function () {
        Route::apiResource('events/{event_id}/orders', 'ApiOrdersController');
        Route::get('event/{event_id}/orders/{order_id}', 'ApiOrdersController@show');
        Route::post('event/{event_id}/orders/{order_id}/addAttendees', 'ApiOrdersController@createUserAndAddtoEvent');
        Route::delete('order/{order_id}/attendee/{attendee_id}', 'ApiOrdersController@deleteAttendee');
//     }
// );

/****************
 * Orders Users
 ****************/
    // ['middleware' => 'auth:token'], function () {
        // Route::apiResource('users/{user_id}/orders/', 'OrdersController@ordersByUsers');
        Route::get('users/{user_id}/orders/', 'ApiOrdersController@ordersByUsers');
        Route::get('me/orders/', 'ApiOrdersController@meOrders');
    // }
// );


Route::apiResource('photos', 'PhotoController');

/* FROM HERE DOWNWARDS UNORGANIZED API ROUTES  WILL DISAPEAR */

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
}); */
Route::resource('messageUser', 'MessageUserController');
Route::get('testsendemail/{id}', 'TestingController@sendemail');
Route::get('testqr', 'TestingController@qrTesting');
Route::get('pdftest', 'TestingController@pdf');
Route::middleware('auth:token')->get('test', 'EventUserController@test');
Route::get('confirmationEmail/{id}', 'TestingController@sendConfirmationEmail');
Route::get('confirmEmail/{id}', 'UserController@confirmEmail');

Route::post('order/{order_id}/resend', [
    'as' => 'resendOrder',
    'uses' => 'EventOrdersController@resendOrder',
]);

//Routes for create a new webhooks in Sendinblue API and Update status of messages send by sendinblue
Route::post('UpdateStatusMessage', 'SendinBlueController@UpdateStatusMessagePOST');
Route::get('activeWebhooks', 'SendinBlueController@activeWebHooks');
Route::get('viewWebhooks', 'TestingController@viewWebhooks');
Route::post('UpdateStatusMessageT', 'TestingController@UpdateStatusMessagePOST');
Route::get('UpdateStatusMessageManually', 'SendinBlueController@UpdateManuallyStatusMessage');

/**
 * This is the routes of event types
 * You can find differents option how get, post, put, deleted
 *
 */

//Events

Route::middleware('auth:token')->get('permissions/{id}', 'PermissionController@getUserPermissionByEvent');

//Account Events Endpoint
Route::post('user/events/{id}/addUserProperty', 'EventController@addUserProperty');

//Route::middleware('auth:token')->post('user/event_users/create/{id}', 'EventUserController@verifyandcreate');
//Route::middleware('auth:token')->post('user/event_users/create', 'EventUserController@store');

Route::middleware('auth:token')->get('rols', 'RolController@index');
Route::get('states', 'StateController@index');

// Route::get('event/messages', 'MessageController@message');
//Route::post('/import/users/events/{id}', 'EventUserController@createImportedUser');

//RSVP
Route::get('rsvp/test', 'RSVPController@test');
Route::get('rsvp/{id}', 'MessageController@show');
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@createAndSendRSVP');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');
Route::get('rsvp/confirmrsvptest/{eventUser}', 'RSVPController@confirmRSVPTest');
Route::get('events/{event_id}/messages', 'MessageController@indexEvent');

//Route::get('rsvp/{id}/log', 'RSVPController@log');

//middleware('auth:token')->
//Route::get("/testroute/{user}", "EventUserController@testing");

//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");
Route::post("files/uploadbase/{name}", "FilesController@storeBaseImg");

//Rol EndPoint
/*
Route::middleware('cors')->get('rols', 'RolController@index');
Route::middleware('cors')->post('rols', 'RolController@store');
Route::middleware('cors')->put('rols/{id}', 'RolController@update');
Route::middleware('cors')->get('rols/{id}', 'RolController@show');
 */
/**
 * REQUEST OF PLACETOPAY
 * https://api.evius.co/api/order/paymentCompleted
 */
Route::post("order/paymentCompleted", "EventCheckoutController@paymentCompleted");
Route::get("order/complete/{order_id}", "EventCheckoutController@completeOrder");
Route::post("postValidateTickets", "EventCheckoutController@postValidateTickets");