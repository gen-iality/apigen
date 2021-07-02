<?php

include "attendize/schedule.php";
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
// Route::get('s3aws/{prefix?}', 'AwsS3Controller');

Route::post('aws/messageupdatestatus', 'AwsSnsController@updateSnsMessages');
Route::get('aws/sendemail', 'AwsSnsController@testEmail');
Route::get('aws/test', 'AwsSnsController@testreqS3');


Route::get('duncan/minutosparajugar', 'DuncanGameController@minutosparajugar');
Route::put('duncan/guardarpuntaje', 'DuncanGameController@guardarpuntaje');
// Route::post('duncan/invitaramigos', 'DuncanGameController@invitaramigos');
Route::get('duncan/setphoneaspassword', 'DuncanGameController@setphoneaspassword');

Route::get('test/serialization', 'TestingController@serialization');
Route::get('test/queue', 'TestingController@testQueue');
Route::get('test/auth', 'TestingController@auth');
Route::get('test/Gateway', 'TestingController@Gateway');
Route::get('test/request/{refresh_token}', 'TestingController@request');
// Route::get('test/error', 'TestingController@error');
Route::get('test/users', 'TestingController@users');
Route::get('test/awsnotification', 'TestingController@awsnotification');
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
 * bigmaker.com conferencing integration
 * https://docs.bigmarker.com/#entering-a-conference
 ****************/
Route::post('integration/bigmaker/conferences/enter', 'IntegrationBigmarkerController@conferencesenter');

/****************
 * eventUsers
 ****************/
//CRUD
Route::post('events/{event}/adduserwithemailvalidation/', 'EventUserController@SubscribeUserToEventAndSendEmail');
Route::put('events/{event}/changeUserPassword/', 'EventUserController@ChangeUserPassword');

Route::get( 'events/{event}/eventusers',      'EventUserController@index');
Route::get( 'events/{event}/eventUsers',      'EventUserController@index');
Route::get( 'events/{event}/eventusers/{id}', 'EventUserController@show');
Route::put( 'events/{event}/eventusers/{id}', 'EventUserController@update')->middleware('permission:update_eventusers');
Route::post( 'events/{event}/eventusers',     'EventUserController@store')->middleware('permission:create_eventusers');
Route::delete('events/{event}/eventusers/{id}', 'EventUserController@destroy')->middleware('permission:destroy_eventusers');
Route::get('events/{event}/eventusers/{id}/unsubscribe', 'EventUserController@unsubscribe');
Route::get('me/eventusers/event/{event}', 'EventUserController@indexByUserInEvent');
Route::get('events/{event}/searchinevent/', 'EventUserController@searchInEvent');
Route::get('events/myevents', 'EventUserController@indexByEventUser');


Route::get('/eventusers/event/{event_id}/user/{user_id}', 'EventUserController@ByUserInEvent');




// // api para transferir eventuser
Route::post('eventusers/{event_id}/tranfereventuser/{event_user}', 'EventUserController@transferEventuserAndEnrollToActivity');
Route::get( 'eventusers/{event_id}/makeTicketIdaProperty/{ticket_id}', 'EventUserManagementController@makeTicketIdaProperty');

Route::get('events/{event_id}/users/{user_id}/asignticketstouser', 'EventUserManagementController@asignTicketsToUser');

Route::put('events/withstatus/{id}', 'EventUserController@updateWithStatus');
Route::put('eventUsers/{id}/withStatus', 'EventUserController@updateWithStatus');

Route::put('eventUsers/{id}/checkin', 'EventUserController@checkIn');
Route::post('eventUsers/createUserAndAddtoEvent/{event_id}', 'EventUserController@createUserAndAddtoEvent');
Route::post('eventUsers/bookEventUsers/{event}', 'EventUserController@bookEventUsers');

Route::post('events/{event_id}/testeventusers', 'EventUserController@testCreateUserAndAddtoEvent');

Route::post('events/{event_id}/eventusers',     'EventUserController@createUserAndAddtoEvent');



Route::get('me/events/{event_id}/eventusers',  'EventUserController@meInEvent');


Route::post('events/{event_id}/eventusersbyurl', 'EventUserController@createUserViaUrl');

//endpoint para eliminar todos los usuarios Route::get ('events/{event_id}/asdasddelete',      'EventUserController@destroyAll');
Route::post('events/{event_id}/sendemailtoallusers', 'EventUserController@sendQrToUsers');
Route::get('events/{event_id}/totalmetricsbyevent/',            'EventUserController@totalMetricsByEvent');
//Metrics
Route::get('events/{event_id}/metricsbydate/eventusers',        'EventUserController@metricsEventByDate');
Route::get('events/{event_id}/hubspotRegister/eventusers',        'EventUserController@hubspotRegister');




/***************
 * activities_attendees asistentes a una actividad(charlas) dentro de un evento
 ****************/
//Route::get    ('events/{event_id}/activities_attendees/{activity_id}',  'ActivityAssistantController@index');
Route::get( 'events/{event}/activities_attendees',      'ActivityAssistantController@index');
Route::get( 'events/{event}/activities_attendees/{id}', 'ActivityAssistantController@show');
Route::put( 'events/{event}/activities_attendees/{id}', 'ActivityAssistantController@update')->middleware('permission:update_activities_attendees');
Route::post( 'events/{event}/activities_attendees',     'ActivityAssistantController@store')->middleware('permission:create_activities_attendees');
Route::delete('events/{event}/activities_attendees/{id}', 'ActivityAssistantController@destroy')->middleware('permission:destroy_activities_attendees');
Route::get('events/{event}/activities_attendees', 'ActivityAssistantController@indexForAdmin');
Route::get('me/events/{event}/activities_attendees',  'ActivityAssistantController@meIndex');
Route::put('events/{event}/activities_attendees/{id}/check_in',  'ActivityAssistantController@checkIn');
Route::get('events/{event}/totalmetricsbyactivity',                'ActivityAssistantController@totalMetricsByActivity');


/***************
 * USER PROPERTIES
 ****************/
Route::get('events/{event}/userproperties', 'UserPropertiesController@index');
Route::post('events/{event}/userproperties', 'UserPropertiesController@store')->middleware('permission:create_userproperties');
Route::get('events/{event}/userproperties/{id}', 'UserPropertiesController@show');
Route::put('events/{event}/userproperties/{id}', 'UserPropertiesController@update')->middleware('permission:update_userproperties');
Route::put('events/{event}/userproperties/{id}/RegisterListFieldOptionTaken', 'UserPropertiesController@RegisterListFieldOptionTaken');
Route::delete('events/{event}/userproperties/{id}', 'UserPropertiesController@destroy')->middleware('permission:destroy_userproperties');

/****************
 * organizations
 ****************/
Route::apiResource('organizations', 'OrganizationController', ['only' => ['index', 'show']]);
Route::post('organizations/{id}/addUserProperty', 'OrganizationController@addUserProperty');
Route::post('organizations/{id}/contactbyemail', 'OrganizationController@contactbyemail');
Route::get('organizations/{id}/eventUsers' , 'OrganizationController@indexByEventUserInOrganization');
Route::put('organizations/{organization_id}/changeUserPassword/', 'OrganizationController@changeUserPasswordOrganization');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('organizations', 'OrganizationController', ['except' => ['index', 'show', 'store']])->middleware('permission:update_organization');
        Route::post('organizations' , 'OrganizationController@store');
        Route::get('me/organizations', 'OrganizationController@meOrganizations');
        // Route::get('organizations/{id}/users', 'OrganizationUserController@store');
        // Route::post('organization_users/{id}', 'OrganizationUserController@verifyandcreate');
    }
);


/****************
 * meetings
 ****************/
Route::apiResource('networking', 'MeetingsController');
Route::get('event/{event_id}/meeting/{meeting_id}/accept', 'MeetingsController@accept');
Route::get('event/{event_id}/meeting/{meeting_id}/reject', 'MeetingsController@reject');

Route::get('event/{event_id}/meeting', 'MeetingsController@index');


/***************
 * SENDCONTENT  TEST CONTROLLER
 ****************/

Route::post('events/sendMecPerfil', 'SendContentController@sendContentGenerated');
Route::post('events/sendMecPerfilMec', 'SendContentController@sendContentMec');
Route::post('events/{event_id}/sendMecPerfilMectoall', 'SendContentController@sendContentToAll');
Route::post('events/sendnotificationemail', 'SendContentController@sendNotificationEmail');

Route::apiResource('events/{event_id}/sendcontent', 'SendContentController@index');

/***************
 * INVITATION
 ****************/
//Route::post("events/{event_id}/sendinvitation" , "InvitationController@SendInvitation");
Route::get('singinwithemail', 'InvitationController@singIn');
Route::get("events/{event_id}/indexinvitations/{user_id}", "InvitationController@invitationsSent");
Route::get("events/{event_id}/indexinvitationsrecieved/{user_id}", "InvitationController@invitationsReceived");
Route::put("events/{event_id}/acceptordecline/{id}", "InvitationController@acceptOrDeclineFriendRequest");
Route::get("events/{event_id}/contactlist/{user_id}", "InvitationController@indexcontacts");
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post("events/{event_id}/meetingrequest/notify", "MeetingsController@meetingrequestnotify");
        Route::get('events/{event}/invitation', 'InvitationController@index')->middleware('permission:index_invitation');
        Route::put('events/{event}/invitation/{invitation}', 'InvitationController@update')->middleware('permission:update_invitation');
        Route::post('events/{event}/invitation', 'InvitationController@store');
        Route::delete('events/{event}/invitation/{invitation}', 'InvitationController@destroy');
        Route::get('events/{event}/invitation/{invitation}', 'InvitationController@show');
    }
);

Route::post("events/{event_id}/contactlist/{user_id}", "InvitationController@indexcontacts");

/****************
 * Users Organization
 ****************/
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('organizations/{organization_id}/users', 'OrganizationUserController', ['except' => ['update']]);
        Route::middleware('auth:token')->get('user/organizationUser/{organization_id}', 'OrganizationUserController@currentUserindex');
        Route::put('organizations/{organization_id}/user/{organization_user_id}', 'OrganizationUserController@update');
    }
);
 //Route::get('me/eventUsers', 'EventUserController@meEvents');
/****************
 * Users
 ****************/
Route::apiResource('users', 'UserController', ['only' => ['index', 'show','store']]);

Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
//Se deja la ruta duplicada mientras en el front el cache se actualiza, con ruta 'users'
Route::get('user/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
// Route::apiResource('users', 'UserController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::put("me/storeRefreshToken", "UserController@storeRefreshToken");
        Route::apiResource('users', 'UserController', ['except' => ['index', 'show','store']]);
        Route::get('users/currentUser', 'FireBaseAuthController@getCurrentUser');
        // Route::apiResource('users', 'UserController', ['except' => ['index', 'show']]);
        Route::get('users/findByEmail/{email}', 'UserController@findrequireByEmail');
        Route::get('me/eventUsers', 'EventUserController@meEvents');
        Route::get('organization/{organzation_id}/users', 'UserController@userOrganization');
        Route::put('users/{user_id}/changeStatusUser' , 'UserController@changeStatusUser'); 
    }
);


Route::post("users/signInWithEmailAndPassword" , "UserController@signInWithEmailAndPassword");
Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
Route::get('users/findByEmail/{email}', 'UserController@findByEmail');


/****************
 * Events
 ****************/
Route::apiResource('events', 'EventController');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('events', 'EventController', ['except' => ['index', 'show']]);
        Route::post('events', 'EventController@store')->middleware('permission:create_event');
        Route::put('events/{event}', 'EventController@update')->middleware('permission:update_event');
        Route::delete('events/{event}' , 'EventController@destroy')->middleware('permission:destroy_event');
        Route::put('events/{event}/changeStatusEvent' , 'EventController@changeStatusEvent')->middleware('permission:update_event');

        Route::get('me/events', 'EventController@currentUserindex');  
        Route::middleware('auth:token')->get('user/events', 'EventController@currentUserindex');
        Route::apiResource('user/events', 'EventController', ['except' => ['index', 'show']]);        
    }
);

Route::get('eventsbeforetoday', 'EventController@beforeToday');
Route::get('users/{id}/events', 'EventController@EventbyUsers');
Route::get('organizations/{id}/events', 'EventController@EventbyOrganizations');

/***************
 * categories
 ****************/
// Route::group(
//     ['middleware' => 'cacheResponse'], function () {
        Route::apiResource('categories', 'CategoryController', ['only' => ['index', 'show']]);
        Route::get('categories/organizations/{organization_ids}' , 'CategoryController@indexByOrganization');
//     }
// );
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('categories', 'CategoryController', ['except' => ['index', 'show']]);
    }
);

/***************
 * RolesAttendees
 ****************/
Route::apiResource('events/{event_id}/rolesattendees', 'RoleAttendeeController');

/***************
 * Mail
 ****************/
Route::apiResource('events/{event_id}/mailing', 'MailController');

/***************
 * CERTIFICATES
 ****************/
Route::post('generatecertificate', 'CertificateController@generateCertificate');
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::get('events/{event}/certficates', 'CertificateController@index');
        Route::put('events/{event}/certficates', 'CertificateController@update')->middleware('permission:update_certificates');
        Route::post('events/{event}/certficates', 'CertificateController@store')->middleware('permission:create_certificates');
        Route::delete('events/{event}/certficates/{certificate}', 'CertificateController@destroy')->middleware('permission:destroy_certificates');
        Route::get('events/{event}/certficates/{certificate}', 'CertificateController@show');
        Route::get('events/{event_id}/certificates', 'CertificateController@indexByEvent');
    }
);

//Route::get('rolesattendees/{id}', 'RoleAttendeeController@index');
Route::apiResource('rolesattendees', 'RoleAttendeeController', ['only' => ['index', 'show']]);
//Route::get('events/{event_id}/rolesattendees', 'RoleAttendeeController@indexByEvent');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('rolesattendees', 'RoleAttendeeController', ['except' => ['index', 'show']]);
        Route::delete('rolesattendees/{id}', 'RoleAttendeeController@destroy');
    }
);

Route::post('crearPermisosRol' , 'RolController@crearPermisosRol');
Route::post('assignPermisosRol' , 'RolController@assignPermisosRol');

/***************
 * Certificate
 ****************/
//Route::apiResource('certificate', 'CertificateController', ['only' => ['index', 'show']]);
Route::apiResource('certificate', 'CertificateController');
/*Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::apiResource('certificate', 'CertificateController', ['except' => ['index', 'show']]);
    }
);*/
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
        Route::get('events/{event}/contributors', 'ContributorController@index');
        Route::post('events/{event}/contributors', 'ContributorController@store')->middleware('permission:create_contributor');
        Route::get('events/{event}/contributors/{id}', 'ContributorController@show');
        Route::put('events/{event}/contributors/{id}', 'ContributorController@update')->middleware('permission:update_contributor');
        Route::delete('events/{event}/contributors/{id}', 'ContributorController@destroy')->middleware('permission:destroy_contributor');

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

Route::apiResource('events/{event_id}/tickets', 'TicketController');
Route::get('ticket/event/{event_id}', 'TicketController@index');

//Route::get('ajustarticketid', 'API\EventTicketsAPIController@ajustarticketid');
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
Route::apiResource('orders', 'ApiOrdersController');
Route::post('orders/{order_id}/validateFreeorder', 'ApiCheckoutController@validateFreeOrder');
Route::post('orders/{order_id}/validatePointOrder', 'ApiCheckoutController@validatePointOrder');
// Route::get('orders/{order_id}', 'ApiOrdersController@show');
Route::post("payment_webhook_response","ApiCheckoutController@paymentWebhookesponse");
//     }
// );

/****************
 * Orders Users
 ****************/
// ['middleware' => 'auth:token'], function () {
// Route::apiResource('users/{user_id}/orders/', 'OrdersController@ordersByUsers');
Route::get('users/{user_id}/orders/', 'ApiOrdersController@ordersByUsers');
Route::get('me/orders/', 'ApiOrdersController@meOrders');
Route::get('orders/{organization_id}/orderOrganization', 'ApiOrdersController@indexByOrganization');


// }
// );

// Route::apiResource('photos', 'PhotoController');

/* FROM HERE DOWNWARDS UNORGANIZED API ROUTES  WILL DISAPEAR */

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
}); */
Route::resource('messageUser', 'MessageUserController');
Route::get('events/{event_id}/message/{message_id}/messageUser', 'MessageUserController@indexMessage');

Route::get('testsendemail/{id}', 'TestingController@sendemail');
Route::get('testqr', 'TestingController@qrTesting');
Route::get('pdftest', 'TestingController@pdf');
Route::middleware('auth:token')->get('test', 'EventUserController@test');
Route::get('confirmationEmail/{id}', 'TestingController@sendConfirmationEmail');
Route::get('confirmEmail/{id}', 'UserController@confirmEmail');
Route::get('borradorepetidos/activity/{activity_id}', 'ActivityAssistantController@borradorepetidos');


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
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@createAndSendRSVP')->middleware('permission:send_email_event');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');
Route::get('rsvp/confirmrsvptest/{eventUser}', 'RSVPController@confirmRSVPTest');
Route::get('events/{event}/messages', 'MessageController@indexEvent')->middleware('permission:list_messages');
Route::put('events/{event_id}/updateStatusMessageUser/{message_id}', 'RSVPController@updateStatusMessageUser');


//Route::get('rsvp/{id}/log', 'RSVPController@log');

//middleware('auth:token')->
//Route::get("/testroute/{user}", "EventUserController@testing");

//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");
Route::post("files/uploadbase/{name}", "FilesController@storeBaseImg");

//Rol EndPoint
Route::get('rols', 'RolController@index');
Route::post('rols', 'RolController@store');
Route::put('rols/{id}', 'RolController@update');
Route::get('rols/{id}', 'RolController@show');
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



/****************
 * DiscountCodes
 ****************/
Route::apiResource("discountcodetemplate", "DiscountCodeTemplateController");
Route::post("discountcodetemplate/{id}/importCodes", "DiscountCodeTemplateController@importCodes");
Route::get("discountcodetemplate/findByOrganization/{organization}", "DiscountCodeTemplateController@findByOrganization");




//y esto que fue? ese api más sospechozso
Route::apiResource("discountcodetemplate/{template_id}/code", "DiscountCodeController");
Route::put("code/exchangeCode", "DiscountCodeController@exchangeCode");
Route::post("code/validatecode", "DiscountCodeController@validateCode");
Route::put("code/redeem_point_code" ,  "DiscountCodeController@redeemPointCode");
