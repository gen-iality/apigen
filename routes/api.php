<?php

include "attendize/schedule.php";
include "roles/rolesOrganization.php";
include "user.php";


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



Route::post('googleanalytics', 'GoogleAnalyticsController');

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
Route::get('sync/firestore/{event}', 'synchronizationController@EventUsers');
Route::get('sync/firestore/{id}', 'synchronizationController@Attendee');
Route::get('sync/firebase/{id}', 'synchronizationController@EventUserRDT');

Route::put('events/{id}/updatestyles', 'EventController@updateStyles');

/****************
 * bigmaker.com conferencing integration
 * https://docs.bigmarker.com/#entering-a-conference
 ****************/
Route::post('integration/bigmaker/conferences/enter', 'IntegrationBigmarkerController@conferencesenter');




/***************
 * activities_attendees asistentes a una actividad(charlas) dentro de un evento
 ****************/
//Route::get    ('events/{event}/activities_attendees/{activity_id}',  'ActivityAssistantController@index');
Route::apiResource('events/{event}/activities_attendees', 'ActivityAssistantController');
Route::get('events/{event}/activities_attendeesAdmin', 'ActivityAssistantController@indexForAdmin');
Route::get('me/events/{event}/activities_attendees',  'ActivityAssistantController@meIndex');
Route::put('events/{event}/activities_attendees/{id}/check_in',  'ActivityAssistantController@checkIn');
Route::get('events/{event}/totalmetricsbyactivity',                'ActivityAssistantController@totalMetricsByActivity');


/***************
 * USER PROPERTIES EVENTS
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post('events/{event}/userproperties', 'UserPropertiesController@store')->middleware('permission:create');
        Route::delete('events/{event}/userproperties/{userpropertie}', 'UserPropertiesController@destroy')->middleware('permission:destroy');
        Route::put('events/{event}/userproperties/{userpropertie}', 'UserPropertiesController@update')->middleware('permission:update');
    }
);

Route::get('events/{event}/userproperties', 'UserPropertiesController@index');
Route::get('events/{event}/userproperties/{userpropertie}', 'UserPropertiesController@show');
Route::put('events/{event}/userproperties/{userpropertie}/RegisterListFieldOptionTaken', 'UserPropertiesController@RegisterListFieldOptionTaken');

/***************
 * USER PROPERTIES ORGANIZATION
 ****************/
Route::get('organizations/{organization}/userproperties', 'OrganizationUserPropertiesController@index');
Route::get('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@show');

Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post('organizations/{organization}/userproperties', 'OrganizationUserPropertiesController@store')->middleware('permission:create');
        Route::put('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@update')->middleware('permission:update');
        Route::delete('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@destroy')->middleware('permission:destroy');
    }
);

/****************
 * organizations
 ****************/
Route::get('organizations', 'OrganizationController@index');
Route::get('organizations/{organization}', 'OrganizationController@show');
Route::post('organizations/{id}/addUserProperty', 'OrganizationController@addUserProperty');
Route::post('organizations/{id}/contactbyemail', 'OrganizationController@contactbyemail');
Route::get('organizations/{id}/eventUsers', 'OrganizationController@indexByEventUserInOrganization');


Route::group(
    ['middleware' => 'auth:token'],
    function () {                
        Route::post('organizations' , 'OrganizationController@store');
        Route::put('organizations/{organization}' , 'OrganizationController@update')->middleware('permission:update');
        Route::delete('organizations/{organization}' , 'OrganizationController@destroy')->middleware('permission:destroy');
        Route::get('me/organizations', 'OrganizationUserController@meOrganizations');
        // Route::get('organizations/{id}/users', 'OrganizationUserController@store');
        // Route::post('organization_users/{id}', 'OrganizationUserController@verifyandcreate');
    }
);


/****************
 * meetings
 ****************/
Route::apiResource('networking', 'MeetingsController');
Route::get('event/{event}/meeting/{meeting_id}/accept', 'MeetingsController@accept');
Route::get('event/{event}/meeting/{meeting_id}/reject', 'MeetingsController@reject');

Route::get('event/{event}/meeting', 'MeetingsController@index');


/***************
 * SENDCONTENT  TEST CONTROLLER
 ****************/

Route::post('events/sendMecPerfil', 'SendContentController@sendContentGenerated');
Route::post('events/sendMecPerfilMec', 'SendContentController@sendContentMec');
Route::post('events/{event}/sendMecPerfilMectoall', 'SendContentController@sendContentToAll');
Route::post('events/sendnotificationemail', 'SendContentController@sendNotificationEmail');

Route::apiResource('events/{event}/sendcontent', 'SendContentController@index');

/***************
 * INVITATION
 ****************/
//Route::post("events/{event}/sendinvitation" , "InvitationController@SendInvitation");
Route::get('singinwithemail', 'InvitationController@singIn');
Route::get("events/{event}/indexinvitations/{user_id}", "InvitationController@invitationsSent");
Route::get("events/{event}/indexinvitationsrecieved/{user_id}", "InvitationController@invitationsReceived");
Route::put("events/{event}/acceptordecline/{id}", "InvitationController@acceptOrDeclineFriendRequest");
Route::get("events/{event}/contactlist/{user_id}", "InvitationController@indexcontacts");
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post("events/{event}/meetingrequest/notify", "MeetingsController@meetingrequestnotify");
    }
);

Route::post("events/{event}/contactlist/{user_id}", "InvitationController@indexcontacts");
Route::apiResource("events/{event}/invitation", "InvitationController");

/****************
 * Users Organization
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::get('organizations/{organization}/organizationusers', 'OrganizationUserController@index');
        Route::get('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@show');
        Route::put('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@update');
        Route::delete('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@destroy');
    }
);
Route::post('organizations/{organization}/addorganizationuser', 'OrganizationUserController@store');

//Route::get('me/eventUsers', 'EventUserController@meEvents');
/****************
 * Users
 ****************/
Route::apiResource('users', 'UserController', ['only' => ['index', 'show', 'store']]);

Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
//Se deja la ruta duplicada mientras en el front el cache se actualiza, con ruta 'users'
Route::get('user/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
// Route::apiResource('users', 'UserController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('users', 'UserController', ['except' => ['index', 'show', 'store']]);
        Route::get('users/currentUser', 'FireBaseAuthController@getCurrentUser');
        // Route::apiResource('users', 'UserController', ['except' => ['index', 'show']]);
        Route::get('users/findByEmail/{email}', 'UserController@findrequireByEmail');
        
        Route::get('organization/{organization}/users', 'UserController@userOrganization');
        Route::put('users/{user_id}/changeStatusUser', 'UserController@changeStatusUser');
    }
);
Route::post("users/signInWithEmailAndPassword", "UserController@signInWithEmailAndPassword");
Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
Route::get('users/findByEmail/{email}', 'UserController@findByEmail');
Route::post('getloginlink', 'UserController@getAccessLink');
Route::get('singinwithemaillink', 'UserController@signInWithEmailLink');
Route::put("changeuserpassword", "UserController@changeUserPassword");



/****************
 * Events
 ****************/
Route::apiResource('events', 'EventController');
Route::post('events/{event}/restore', 'EventController@restore');

//Route::get("eventsearch",'EventController');
//     }
// );

Route::group(
    ['middleware' => 'auth:token'],
    function () {        
        Route::post ('events/{event}', 'EventController@store')->middleware('permission:create');        
        Route::put ('events/{event}', 'EventController@update')->middleware('permission:update');
        Route::delete('events/{event}', 'EventController@destroy')->middleware('permission:destroy');
        Route::get('me/events', 'EventController@currentUserindex');
        //this routes should be erased after front migration
        Route::apiResource('user/events', 'EventController', ['except' => ['index', 'show']]);
        Route::middleware('auth:token')->get('user/events', 'EventController@currentUserindex');
        Route::put('events/{event}/changeStatusEvent', 'EventController@changeStatusEvent');
    }
);

Route::get('eventsbeforetoday', 'EventController@beforeToday');
Route::get('eventsaftertoday', 'EventController@afterToday');
Route::get('users/{user}/events', 'EventController@EventbyUsers');
Route::get('organizations/{organization}/events', 'EventController@EventbyOrganizations');
Route::get('organizations/{organization}/eventsstadistics', 'EventStatisticsController@eventsstadistics');

Route::post('events/{event}/surveys/{id}/coursefinished', 'EventStatisticsController@courseFinished');



/***************
 * categories
 ****************/
// Route::group(
//     ['middleware' => 'cacheResponse'], function () {
Route::apiResource('categories', 'CategoryController', ['only' => ['index', 'show']]);
Route::get('categories/organizations/{organization_ids}', 'CategoryController@indexByOrganization');
//     }
// );
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('categories', 'CategoryController', ['except' => ['index', 'show']]);
    }
);

/***************
 * RolesAttendees
 ****************/
Route::apiResource('events/{event}/rolesattendees', 'RoleAttendeeController');

/***************
 * Mail
 ****************/
Route::apiResource('events/{event}/mailing', 'MailController');

/***************
 * CERTIFICATES
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('certificates', 'CertificateController', ['except' => ['index', 'show']]);
        Route::get ('events/{event}/certificates', 'CertificateController@index');
        Route::post ('events/{event}/certificates', 'CertificateController@store')->middleware('permission:create');
        Route::get ('events/{event}/certificates/{certificate}', 'CertificateController@show');
        Route::put ('events/{event}/certificates/{certificate}', 'CertificateController@update')->middleware('permission:update');
        Route::delete('events/{event}/certificates/{certificate}', 'CertificateController@destroy')->middleware('permission:destroy');
        Route::post('generatecertificate', 'CertificateController@generateCertificate');
    }
);

//Route::get('rolesattendees/{id}', 'RoleAttendeeController@index');
Route::apiResource('rolesattendees', 'RoleAttendeeController', ['only' => ['index', 'show']]);
//Route::get('events/{event}/rolesattendees', 'RoleAttendeeController@indexByEvent');

Route::group(
    ['middleware' => 'auth:token'],
    function () {
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
    ['middleware' => 'auth:token'],
    function () {
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
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('escarapelas', 'EscarapelaController', ['except' => ['index', 'show']]);
    }
);

/****************
 * Contributors = STAFF
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {

        //no sabemos como anteponerle el evento al apiresource lo deshabilitamos
        //Route::apiResource('contributors', 'ContributorController', ['except' => ['index']]);
        Route::get('events/{event}/contributors', 'ContributorController@index');
        Route::post('events/{event}/contributors', 'ContributorController@store');
        Route::get('events/{event}/contributors/{id}', 'ContributorController@show');
        Route::put('events/{event}/contributors/{id}', 'ContributorController@update');
        Route::delete('events/{event}/contributors/{id}', 'ContributorController@destroy');

        //Carga los roles
        Route::get('contributors/metadata/roles', 'ContributorController@metadata_roles');

        //Para cargar informaci�n de contributor del usuario actual
        Route::get('contributors/events/{event}/me', 'ContributorController@meAsContributor');
        Route::get('me/contributors/events', 'ContributorController@myEvents');

        //esto hace lo mismo que una ruta de arriba cual dejamos?
        Route::get('contributors/events/{event}', 'ContributorController@index');
    }
);

/****************
 * Contributors
 ****************/
//Route::group(
//['middleware' => 'auth:token'], function () {

Route::apiResource('events/{event}/tickets', 'TicketController');
Route::get('ticket/event/{event}', 'TicketController@index');

//Route::get('ajustarticketid', 'API\EventTicketsAPIController@ajustarticketid');
// }
//);

/****************
 * Speakers
 ****************/
// Route::group(
// ['middleware' => 'auth:token'], function () {
Route::apiResource('events/{event}/speakers', 'SpeakerController');
// }
// );

/****************
 * Event Sessions
 ****************/
// Route::group(
// ['middleware' => 'auth:token'], function () {
Route::apiResource('events/{event}/sessions', 'EventSessionController');
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
Route::post('orders/{order_id}/validatePointOrderTest', 'ApiCheckoutController@validatePointOrderTest');

Route::get('events/{event}/orders/ordersevent', 'ApiOrdersController@indexByEvent');

// Route::get('orders/{order_id}', 'ApiOrdersController@show');
Route::post("payment_webhook_response", "ApiCheckoutController@paymentWebhookesponse");
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
Route::get('events/{event}/message/{message_id}/messageUser', 'MessageUserController@indexMessage');

Route::get('testsendemail/{id}', 'TestingController@sendemail');
Route::get('testqr', 'TestingController@qrTesting');
Route::get('pdftest', 'TestingController@pdf');
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

Route::middleware('auth:token')->get('permissions/{id}', 'PermissionEventController@getUserPermissionByEvent');

//Account Events Endpoint
Route::post('user/events/{id}/addUserProperty', 'EventController@addUserProperty');



Route::get('states', 'StateController@index');



//RSVP
Route::get('rsvp/test', 'RSVPController@test');
Route::get('rsvp/{id}', 'MessageController@show');
Route::post('rsvp/sendeventrsvp/{event}', 'RSVPController@createAndSendRSVP')->middleware('permission:send_email_event');
Route::get('rsvp/confirmrsvp/{eventUser}', 'RSVPController@confirmRSVP');
Route::get('rsvp/confirmrsvptest/{eventUser}', 'RSVPController@confirmRSVPTest');
Route::get('events/{event}/messages', 'MessageController@indexEvent');
Route::put('events/{event}/updateStatusMessageUser/{message_id}', 'RSVPController@updateStatusMessageUser');



//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");
Route::post("files/uploadbase/{name}", "FilesController@storeBaseImg");

//Rol EndPoint
// Route::get('events/{event}/rols', 'RolEventController@index');
Route::middleware('auth:token')->get('rols', 'RolEventController@index');
// Route::post('rols', 'RolEventController@store');
// Route::put('rols/{id}', 'RolEventController@update');
// Route::get('rols/{id}', 'RolEventController@show');
Route::get('rols/{id}/rolseventspublic', 'RolEventController@showRolPublic');
// Route::post('roles/{role}/addpermissions', 'RolesPermissionsEventController@addPermissionToRol');

Route::get('rolespermissionsevents/findbyrol/{rol}', 'RolesPermissionsEventController@indexByRol');
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
Route::put("code/redeem_point_code",  "DiscountCodeController@redeemPointCode");
Route::get("code/codesByUser",  "DiscountCodeController@codesByUser");

Route::get("organization/{organization}/ordersUsersPoints",  "OrganizationController@ordersUsersPoints");


/****************
* Product
****************/
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/products', 'ProductController@store')->middleware('permission:create');
        Route::put('events/{event}/products/{product}', 'ProductController@update')->middleware('permission:update');
        Route::delete('events/{event}/products/{product}', 'ProductController@destroy')->middleware('permission:destroy');
        Route::post('events/{event}/products/{product}/silentauctionmail', 'ProductController@createSilentAuction')->middleware('permission:send_products_silentauctiomail');
    }
);

Route::get('events/{event}/products', 'ProductController@index');
Route::get('events/{event}/products/{product}', 'ProductController@show');


/****************
 * Comment
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post('comments', 'CommentController@store');
        Route::put('comments/{comment}', 'CommentController@update');
        Route::delete('comments/{comment}', 'CommentController@destroy');
        Route::get('comments', 'CommentController@index');
    }
);
Route::get('comments/organizations/{organization}', 'CommentController@indexByOrganization');

// ------------------------------------------------------TEST
Route::put('codestest', 'DiscountCodeController@codesTest');

/****************
 * TemplateProperties
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::get('organizations/{organizaton}/templateproperties', 'TemplatePropertiesController@index');
        Route::post('organizations/{organizaton}/templateproperties', 'TemplatePropertiesController@store');
        // Route::put('organizations/{organizaton}/templateproperties/{templatepropertie}', 'TemplatePropertiesController@addTemplateEvent');
        Route::put('organizations/{organizaton}/templateproperties/{templatepropertie}', 'TemplatePropertiesController@update');
        Route::delete('organizations/{organizaton}/templateproperties/{templatepropertie}', 'TemplatePropertiesController@destroy');
        Route::put('events/{event}/templateproperties/{templatepropertie}/addtemplateporperties', 'TemplatePropertiesController@addTemplateEvent');
    }
);

/****************
 * DocumenUser
 ****************/
//Route::group(
//['middleware' => 'auth:token'], function () {
//Route::get('events/{event}/documentusers', 'DocumentUserController@index'); 
//}
//);

/****************
 * DocumenUser
 ****************/
Route::get('events/{event}/documentusers', 'DocumentUserController@index');
Route::get('events/{event}/documentusers/{documentuser}', 'DocumentUserController@show');
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post('events/{event}/documentusers', 'DocumentUserController@store')->middleware('permission:create');
        Route::put('events/{event}/documentusers/{documentuser}', 'DocumentUserController@update')->middleware('permission:update');
        Route::delete('events/{event}/documentusers/{documentuser}', 'DocumentUserController@destroy')->middleware('permission:destroy');
        // retorna todos los documentos de un usuario de un evento
        Route::get('events/{event}/me/documentusers', 'DocumentUserController@documentsUserByUser');
        Route::put('events/{event}/adddocumentuser', 'EventController@addDocumentUserToEvent');        
    }
);


// addDocumentUserToEventUserByEvent
// Route::post('events/{event}/documentusers/user/{event_user}', 'DocumentUserController@addDocumentUserToEventUserByEvent');

