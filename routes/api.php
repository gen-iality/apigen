<?php

include "attendize/schedule.php";
include "roles/rolesOrganization.php";
include "roles/rolesAttendee.php";
include "organization/organization.php";
include "user/user.php";
include "user/userEvent.php";
include "mail.php";
include "test.php";
include "web.php";




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

/***************
 * AWS
 ****************/
Route::post('aws/messageupdatestatus', 'AwsSnsController@updateSnsMessages');
Route::get('aws/sendemail', 'AwsSnsController@testEmail');
Route::get('aws/test', 'AwsSnsController@testreqS3');

/****************
 * Events
 ****************/
Route::apiResource('events', 'EventController');
Route::post('events/{event}/restore', 'EventController@restore');
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


Route::post('events/{event}/surveys/{id}/coursefinished', 'EventStatisticsController@courseFinished');


Route::post('googleanalytics', 'GoogleAnalyticsController');



Route::get('duncan/minutosparajugar', 'DuncanGameController@minutosparajugar');
Route::put('duncan/guardarpuntaje', 'DuncanGameController@guardarpuntaje');
// Route::post('duncan/invitaramigos', 'DuncanGameController@invitaramigos');
Route::get('duncan/setphoneaspassword', 'DuncanGameController@setphoneaspassword');



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


//Route::get('me/eventUsers', 'EventUserController@meEvents');






/***************
 * categories
 ****************/
// Route::group(
//     ['middleware' => 'cacheResponse'], function () {
Route::apiResource('categories', 'CategoryController', ['only' => ['index', 'show']]);

//     }
// );
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('categories', 'CategoryController', ['except' => ['index', 'show']]);
    }
);

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
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/orders/create-preorder', 'ApiOrdersController@createPreOrder');
        Route::put('orders/{order}/create-tickets', 'ApiOrdersController@updateOrderAndAddTickets');
        Route::post('events/{event}/orders/create-order-to-partner', 'ApiOrdersController@createOrderToPartner');
    }
);
Route::get('orders/tickets-available/{event}', 'ApiOrdersController@getTicketsAvailable');

Route::apiResource('orders', 'ApiOrdersController');
Route::post('orders/{order_id}/validateFreeorder', 'ApiCheckoutController@validateFreeOrder');
Route::post('orders/{order_id}/validatePointOrder', 'ApiCheckoutController@validatePointOrder');
Route::post('orders/{order_id}/validatePointOrderTest', 'ApiCheckoutController@validatePointOrderTest');

Route::get('events/{event}/orders/ordersevent', 'ApiOrdersController@indexByEvent');

// Route::get('orders/{order_id}', 'ApiOrdersController@show');
Route::post("payment_webhook_response", "ApiCheckoutController@paymentWebhookesponse");

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


/**
 * This is the routes of event types
 * You can find differents option how get, post, put, deleted
 *
 */

//Events

// Route::middleware('auth:token')->get('permissions/{id}', 'PermissionEventController@getUserPermissionByEvent');

//Account Events Endpoint
Route::post('user/events/{id}/addUserProperty', 'EventController@addUserProperty');



Route::get('states', 'StateController@index');






//MISC Controllers
Route::post("files/upload/{field_name?}", "FilesController@upload");
Route::post("files/uploadbase/{name}", "FilesController@storeBaseImg");

//Rol EndPoint
// Route::get('events/{event}/rols', 'RolEventController@index');
Route::middleware('auth:token')->get('rols', 'RolController@index');
// Route::post('rols', 'RolEventController@store');
// Route::put('rols/{id}', 'RolEventController@update');
// Route::get('rols/{id}', 'RolEventController@show');
Route::get('rols/{id}/rolseventspublic', 'RolController@showRolPublic');
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


// ------------------------------------------------------TEST
Route::put('codestest', 'DiscountCodeController@codesTest');



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

/** 
 *  ROUTES My Plan */

/*****
 * Current plan
 */

Route::get('users/{user}/currentPlan', 'UserController@currentPlanInfo');

/** 
 *  ROUTES RESTRICCION */

 /*****
 * Coupons
 */

Route::get('coupons/{name}', 'CouponsController@findByName');
Route::post('coupons', 'CouponsController@store')->middleware('permission:create');

/*****
 * Plan
 */

Route::apiResource('plans', 'PlansController');

/*****
 * Notification
 */

Route::apiResource('notifications', 'NotificationController');
Route::get('users/{user}/notifications', 'NotificationController@NotificationbyUser');

/*****
 * Billing
 */

Route::apiResource('billings', 'BillingController');
Route::get('users/{user}/billings', 'BillingController@BillingbyUser');
Route::get('reference/{reference}/billings', 'BillingController@findByReference');
Route::put('reference/{reference}/billings', 'BillingController@updateByReference');

/*****
 * Payment
 */

Route::apiResource('payments', 'PaymentController');
Route::get('users/{user}/payments', 'PaymentController@PaymentbyUser');

/*****
 * Addons
 */

Route::apiResource('addons', 'AddonController');
Route::get('users/{user}/addons', 'AddonController@AddonbyUser');

/*****
 * PreviewLanding
 */

Route::apiResource('previews', 'PreviewLandingController');
Route::get('event/{event}/previews', 'PreviewLandingController@PreviewsbyEvent');
<<<<<<< HEAD
Route::post('event/{event}/addmanypreviews', 'PreviewLandingController@CreateMany');
=======
Route::get('guess-pass', 'UserController@guessPassword');
>>>>>>> 4ea41461f934d7455b5fcda2104ea1c2248dbd4f
