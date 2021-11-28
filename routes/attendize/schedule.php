<?php

Route::get ('events/{event_id}/eventusers',      'EventUserController@indexar');
Route::get ('events/{event_id}/eventusers/{id}', 'EventUserController@mostrar');

/****************
 * SPACES
 ****************/

Route::get ('events/{event_id}/spaces', 'SpaceController@index')->middleware('cacheResponse');
Route::post ('events/{event_id}/spaces', 'SpaceController@store');
Route::get ('events/{event_id}/spaces/{id}', 'SpaceController@show')->middleware('cacheResponse');
Route::put ('events/{event_id}/spaces/{id}', 'SpaceController@update');
Route::delete('events/{event_id}/spaces/{id}', 'SpaceController@destroy');


/****************
 * APP CONFIGURATION
 ****************/
Route::apiResource('event/{id}/configuration', 'AppConfigurationController');
Route::delete('event/{id}/configuration', 'AppConfigurationController@destroy');


/****************
 * EVIUS STYLES
 ****************/
Route::apiResource('events/{event_id}/styles', 'StylesController');

Route::get('events/{event_id}/stylestemp', 'StylesController@indexTemp');


/****************
 * NEWSFEED
 ****************/
// Route::apiResource('events/{event}/newsfeed', 'NewsfeedController');
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::get('events/{event}/newsfeed','NewsfeedController@index');
        Route::get('events/{event}/newsfeed/{newsfeed}','NewsfeedController@show');
        Route::post('events/{event}/newsfeed','NewsfeedController@store');
        Route::put('events/{event}/newsfeed/{newsfeed}','NewsfeedController@update');
        Route::delete('events/{event}/newsfeed/{newsfeed}','NewsfeedController@destroy');
    }
);

/****************
 * SURVEYS
 ****************/

Route::apiResource('events/{id}/surveys', 'SurveysController');
Route::put('events/{event_id}/questionedit/{id}', 'SurveysController@updatequestions');


/***************
 * HOST
 * rutas para guardar la agenda de los eventos
 ****************/

Route::post  ('events/{event_id}/duplicatehost/{id}','HostController@duplicate');
Route::apiResource('events/{event_id}/host', 'HostController');

/***************
 * ACTIVITIES
 ****************/

Route::post  ('/meetingrecording',      'ActivitiesController@storeMeetingRecording');
Route::post  ('events/{event_id}/duplicateactivitie/{id}',      'ActivitiesController@duplicate');
Route::get  ('events/{event_id}/activitiesbyhost/{host_id}',      'ActivitiesController@indexByHost');
Route::apiResource('events/{event_id}/activities', 'ActivitiesController');
Route::post  ('events/{event_id}/createmeeting/{id}', 'ActivitiesController@createMeeting');
Route::put('events/{event_id}/activities/{id}/hostAvailability' ,  'ActivitiesController@hostAvailability');
Route::post   ('events/{event_id}/activities/{id}/register_and_checkin_to_activity',  'ActivitiesController@registerAndCheckInActivity');
Route::put('events/{event_id}/activities/mettings_zoom/{meeting_id}' ,  'ActivitiesController@deleteVirtualSpaceZoom');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/activities/{activity}/checkinbyadmin',  'ActivitiesController@checkinbyadmin')->middleware('permission:create_checkinbyadmin');
    }
);

/***************
 * TYPE
 ****************/
Route::apiResource('events/{event_id}/type','TypeController');

/***************
 * ACTIVITYCATEGORIES (las categorias para las actividades de la agenda)
 ****************/
Route::apiResource('events/{event_id}/categoryactivities',      'ActivityCategoriesController');

/***************
 * TEST API'S
 ****************/
// Route::apiResource('testsendrecovery', 'TestEmailRecoveryController',['only' => ['index']]);
Route::post('findbase/findbase/{id}', 'SendContentController@Attendee');
Route::post('saveImagesInStorage' , "SendContentController@saveImagesInStorage");
// Route::post("verifyuser","VertifyController@validateUser");


/*******************
 * RECOVERY PASSWORD
 ******************/
Route::post('events/{event_id}/recoverypassword', 'SendContentController@PasswordRecovery');


/********************
 * PUSH NOTIFICATIONS
 ********************/
Route::apiResource('events/{event_id}/sendpush', 'PushNotificationsController');
//Route::post('event/{event_id}/sendpush', 'SendContentController@sendPushNotification');
Route::get('event/{event_id}/notifications/{id}', 'PushNotificationsController@indexByUser');



/*******************
 * DOCUMENTS UPLOAD
 ******************/
Route::apiResource('events/{event_id}/documents', 'DocumentsController');
Route::get('events/{event_id}/getallfiles/', 'DocumentsController@indexFiles');
 

/*******
 * WALL
 ******/
Route::apiResource('events/{event_id}/wall', 'WallController');
 
 

/*******************
 * FAQ'S
 ******************/
Route::apiResource('events/{id}/faqs', 'FaqController');
Route::post ('events/{event_id}/duplicatefaqs/{id}','FaqController@duplicate');

//TEST 
Route::put('events/{id}/zoomhost', 'ZoomHostController@update');
Route::post('events/zoomhost', 'ZoomHostController@updateStatus');
Route::get('events/zoomhost', 'ZoomHostController@index');

/*******
 * RSVP
 ******/
 Route::post("events/{event_id}/wallnotifications", "RSVPController@wallActivity")

?>
