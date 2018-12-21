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
Route::get('testsendemail', 'TestingController@sendemail');
Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'EventController@test');

Route::get('/rsvptemplate', function () {

    $event = new App\Event();
    $event->name="event best";
    $event->venue    ="venue";
    $event->location ="location";
    $event->description ="description";

    $eventUser = new App\EventUser();
    $eventUser->name ="odiseo";
    $eventUser->email ="odiseo@iliada.com";

    return new App\Mail\RSVP("message", $event, $eventUser, null, "footer", "subject");
});

/*
             * @todo Move to a controller
             */
            Route::get('{event_id}/go_live', [
                'as' => 'MakeEventLive',
                function ($event_id) {
                    $event = \App\Models\Event::findOrFail($event_id);
                    $event->is_live = 1;
                    $event->save();
                    \Session::flash('message',
                        'Event Successfully Made Live! You can undo this action in event settings page.');

                    return Redirect::route('showEventDashboard', [
                        'event_id' => $event_id,
                    ]);
                }
            ]);
    /*
    * -------
    * Tickets
    * -------
    */
Route::get('{event_id}/tickets/', [
    'as'   => 'showEventTickets',
    'uses' => 'EventTicketsController@showTickets',
]);
Route::get('{event_id}/tickets/edit/{ticket_id}', [
    'as'   => 'showEditTicket',
    'uses' => 'EventTicketsController@showEditTicket',
]);
Route::post('{event_id}/tickets/edit/{ticket_id}', [
    'as'   => 'postEditTicket',
    'uses' => 'EventTicketsController@postEditTicket',
]);
Route::get('{event_id}/tickets/create', [
    'as'   => 'showCreateTicket',
    'uses' => 'EventTicketsController@showCreateTicket',
]);
Route::post('{event_id}/tickets/create', [
    'as'   => 'postCreateTicket',
    'uses' => 'EventTicketsController@postCreateTicket',
]);
Route::post('{event_id}/tickets/delete', [
    'as'   => 'postDeleteTicket',
    'uses' => 'EventTicketsController@postDeleteTicket',
]);
Route::post('{event_id}/tickets/pause', [
    'as'   => 'postPauseTicket',
    'uses' => 'EventTicketsController@postPauseTicket',
]);
Route::post('{event_id}/tickets/order', [
    'as'   => 'postUpdateTicketsOrder',
    'uses' => 'EventTicketsController@postUpdateTicketsOrder',
]);

    /*
    * -------
    * Orders
    * -------
    */
Route::get('{event_id}/orders/', [
    'as'   => 'showEventOrders',
    'uses' => 'EventOrdersController@showOrders',
]);

Route::get('order/{order_id}', [
    'as'   => 'showManageOrder',
    'uses' => 'EventOrdersController@manageOrder',
]);

Route::post('order/{order_id}/resend', [
    'as' => 'resendOrder',
    'uses' => 'EventOrdersController@resendOrder',
]);

Route::get('order/{order_id}/show/edit', [
    'as' => 'showEditOrder',
    'uses' => 'EventOrdersController@showEditOrder',
]);

Route::post('order/{order_id}/edit', [
    'as' => 'postOrderEdit',
    'uses' => 'EventOrdersController@postEditOrder',
]);

Route::get('order/{order_id}/cancel', [
    'as'   => 'showCancelOrder',
    'uses' => 'EventOrdersController@showCancelOrder',
]);

Route::post('order/{order_id}/cancel', [
    'as'   => 'postCancelOrder',
    'uses' => 'EventOrdersController@postCancelOrder',
]);

Route::post('order/{order_id}/mark_payment_received', [
    'as'   => 'postMarkPaymentReceived',
    'uses' => 'EventOrdersController@postMarkPaymentReceived',
]);

Route::get('{event_id}/orders/export/{export_as?}', [
    'as'   => 'showExportOrders',
    'uses' => 'EventOrdersController@showExportOrders',
]);
Route::get('{event_id}/orders/message', [
    'as'   => 'showMessageOrder',
    'uses' => 'EventOrdersController@showMessageOrder',
]);

Route::post('{event_id}/orders/message', [
    'as'   => 'postMessageOrder',
    'uses' => 'EventOrdersController@postMessageOrder',
]);

    /*
    * Organiser routes
    */
Route::group(['prefix' => 'organiser'], function () {

    Route::get('{organiser_id}/dashboard', [
        'as'   => 'showOrganiserDashboard',
        'uses' => 'OrganiserDashboardController@showDashboard',
    ]);
    Route::get('{organiser_id}/events', [
        'as'   => 'showOrganiserEvents',
        'uses' => 'OrganiserEventsController@showEvents',
    ]);

    Route::get('{organiser_id}/customize', [
        'as'   => 'showOrganiserCustomize',
        'uses' => 'OrganiserCustomizeController@showCustomize',
    ]);
    Route::post('{organiser_id}/customize', [
        'as'   => 'postEditOrganiser',
        'uses' => 'OrganiserCustomizeController@postEditOrganiser',
    ]);

    Route::get('create', [
        'as'   => 'showCreateOrganiser',
        'uses' => 'OrganiserController@showCreateOrganiser',
    ]);
    Route::post('create', [
        'as'   => 'postCreateOrganiser',
        'uses' => 'OrganiserController@postCreateOrganiser',
    ]);

    Route::post('{organiser_id}/page_design', [
        'as'   => 'postEditOrganiserPageDesign',
        'uses' => 'OrganiserCustomizeController@postEditOrganiserPageDesign'
    ]);
});

    /*
    * Edit User
    */
Route::group(['prefix' => 'user'], function () {

    Route::get('/', [
        'as'   => 'showEditUser',
        'uses' => 'UserController@showEditUser',
    ]);
    Route::post('/', [
        'as'   => 'postEditUser',
        'uses' => 'UserController@postEditUser',
    ]);

});

    /*
     * Logout
     */
    Route::any('/logout', [
        'uses' => 'UserLogoutController@doLogout',
        'as'   => 'logout',
    ]);
