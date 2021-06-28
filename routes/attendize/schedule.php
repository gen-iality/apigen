<?php

Route::get ('events/{event_id}/eventusers',      'EventUserController@indexar');
Route::get ('events/{event_id}/eventusers/{id}', 'EventUserController@mostrar');

/****************
 * SPACES
 ****************/

Route::get ('events/{event}/spaces', 'SpaceController@index')->middleware('cacheResponse');
Route::post ('events/{event}/spaces', 'SpaceController@store')->middleware('permission:create_space');
Route::get ('events/{event}/spaces/{id}', 'SpaceController@show')->middleware('cacheResponse');
Route::put ('events/{event}/spaces/{id}', 'SpaceController@update')->middleware('permission:update_space');
Route::delete('events/{event}/spaces/{id}', 'SpaceController@destroy')->middleware('permission:destroy_space');


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

Route::apiResource('events/{id}/newsfeed', 'NewsfeedController');

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
Route::apiResource('events/{event_id}/host', 'HostController', ['except' => ['index', 'show']])->middleware('permission:create_host|update_host|destroy_host');
Route::apiResource('events/{event_id}/host', 'HostController', ['only' => ['index', 'show']]);


/***************
 * ACTIVITIES
 ****************/

Route::post  ('/meetingrecording',      'ActivitiesController@storeMeetingRecording');
Route::post  ('events/{event_id}/duplicateactivitie/{id}',      'ActivitiesController@duplicate');
Route::get  ('events/{event_id}/activitiesbyhost/{host_id}',      'ActivitiesController@indexByHost');
Route::apiResource('events/{event}/activities', 'ActivitiesController' , ['except' => ['index', 'show']])->middleware('permission:create_activity|update_activity|destroy_activity');
Route::apiResource('events/{event}/activities', 'ActivitiesController' , ['only' => ['index', 'show']]);
Route::post  ('events/{event_id}/createmeeting/{id}', 'ActivitiesController@createMeeting');
Route::put('events/{event_id}/activities/{id}/hostAvailability' ,  'ActivitiesController@hostAvailability');
Route::post   ('events/{event_id}/activities/{id}/register_and_checkin_to_activity',  'ActivitiesController@registerAndCheckInActivity');
Route::put('events/{event_id}/activities/mettings_zoom/{meeting_id}' ,  'ActivitiesController@deleteVirtualSpaceZoom');


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