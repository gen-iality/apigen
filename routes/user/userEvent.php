<?php

/*
|--------------------------------------------------------------------------
| USER EVENT Routes
|--------------------------------------------------------------------------
| This is where you can register API routes to manage users in the events and the their submodules
| 
*/

/****************
* EventUsers
****************/
Route::post('events/{event}/eventusers', 'EventUserController@store');
Route::get('events/{event}/eventusers/{eventuser}/unsubscribe', 'EventUserController@unsubscribe');
Route::post('events/{event}/adduserwithemailvalidation/', 'EventUserController@SubscribeUserToEventAndSendEmail')
    ->middleware('userRegistrationRestriction', 'OrganizersRestriction');
Route::post('eventusers/{event}/tranfereventuser/{event_user}', 'EventUserController@transferEventuserAndEnrollToActivity');
Route::get('eventusers/{event}/makeTicketIdaProperty/{ticket_id}', 'EventUserManagementController@makeTicketIdaProperty');
Route::get('events/{event}/users/{user_id}/asignticketstouser', 'EventUserManagementController@asignTicketsToUser');
Route::put('events/withstatus/{id}', 'EventUserController@updateWithStatus');
Route::put('eventUsers/{id}/withStatus', 'EventUserController@updateWithStatus');
Route::put('eventUsers/{eventuser}/checkin', 'EventUserController@checkIn');
Route::post('eventUsers/createUserAndAddtoEvent/{event}', 'EventUserController@createUserAndAddtoEvent')
    ->middleware('userRegistrationRestriction', 'OrganizersRestriction');
Route::post('eventUsers/bookEventUsers/{event}', 'EventUserController@bookEventUsers');
Route::post('events/{event}/eventusersbyurl', 'EventUserController@createUserViaUrl');
Route::post('events/{event}/sendemailtoallusers', 'EventUserController@sendQrToUsers');
Route::post('events/{event}/eventusersanonymous',     'EventUserController@store');
Route::get('events/{event}/eventusers', 'EventUserController@index');
Route::get('events/{event}/eventUsers',      'EventUserController@index');
Route::group(
    ['middleware' => 'auth:token'], function () {
        
        Route::get('events/{event}/eventusers/{eventuser}', 'EventUserController@show');              
        Route::put('events/{event}/eventusers/{eventuser}', 'EventUserController@update')
            ->middleware('permissionUser:update', 'OrganizersRestriction');
        Route::delete('events/{event}/eventusers/{eventuser}', 'EventUserController@destroy')->middleware('permissionUser:destroy');
        Route::get('me/eventusers/event/{event}', 'EventUserController@indexByUserInEvent');
        Route::get('events/myevents', 'EventUserController@indexByEventUser');
        Route::get('events/{event}/searchinevent/', 'EventUserController@searchInEvent');
        Route::get('/eventusers/event/{event}/user/{user_id}', 'EventUserController@ByUserInEvent');
        Route::get('me/events/{event}/eventusers',  'EventUserController@meInEvent');
        Route::get('events/{event}/totalmetricsbyevent/', 'EventUserController@totalMetricsByEvent');
        Route::get('events/{event}/metricsbydate/eventusers',        'EventUserController@metricsEventByDate');
        Route::put('events/{event}/eventusers/{eventuser}/updaterol', 'EventUserController@updateRolAndSendEmail')
            ->middleware('OrganizersRestriction');
        Route::get('me/eventUsers', 'EventUserController@meEvents');
    }
);


/***************
 * ActivityAssistant asistentes a una actividad(charlas) dentro de un evento
 ****************/
//Route::get    ('events/{event}/activities_attendees/{activity_id}',  'ActivityAssistantController@index');
Route::apiResource('events/{event}/activities_attendees', 'ActivityAssistantController');
Route::get('events/{event}/activities_attendeesAdmin', 'ActivityAssistantController@indexForAdmin');
Route::get('me/events/{event}/activities_attendees',  'ActivityAssistantController@meIndex');
Route::put('events/{event}/activities_attendees/{id}/check_in',  'ActivityAssistantController@checkIn');
Route::get('events/{event}/totalmetricsbyactivity',                'ActivityAssistantController@totalMetricsByActivity');

