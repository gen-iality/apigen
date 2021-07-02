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
Route::delete('event/{id}/configuration', 'AppConfigurationController@delete');


/****************
 * EVIUS STYLES
 ****************/
Route::apiResource('events/{event_id}/styles', 'StylesController');

Route::get('events/{event_id}/stylestemp', 'StylesController@indexTemp');


/****************
 * NEWSFEED
 ****************/
Route::get('events/{event}/newsfeed', 'NewsfeedController@index');
Route::put('events/{event}/newsfeed', 'NewsfeedController@update')->middleware('permission:update_news');
Route::post('events/{event}/newsfeed', 'NewsfeedController@store')->middleware('permission:create_news');
Route::delete('events/{event}/newsfeed/{new}', 'NewsfeedController@destroy')->middleware('permission:destroy_news');
Route::get('events/{event}/newsfeed/{new}', 'NewsfeedController@show');


/****************
 * SURVEYS
 ****************/

Route::apiResource('events/{id}/surveys', 'SurveysController');
Route::put('events/{event_id}/questionedit/{id}', 'SurveysController@updatequestions');


/***************
 * HOST
 * rutas para guardar la agenda de los eventos
 ****************/
Route::get('events/{event}/host', 'HostController@index');
Route::put('events/{event}/host', 'HostController@update')->middleware('permission:update_host');
Route::post('events/{event}/host', 'HostController@store')->middleware('permission:create_host');
Route::delete('events/{event}/host/{host}', 'HostController@destroy')->middleware('permission:destroy_host');
Route::get('events/{event}/host/{host}', 'HostController@show');
Route::post  ('events/{event_id}/duplicatehost/{id}','HostController@duplicate');



/***************
 * ACTIVITIES
 ****************/

Route::post  ('/meetingrecording',      'ActivitiesController@storeMeetingRecording');
Route::post  ('events/{event_id}/duplicateactivitie/{id}',      'ActivitiesController@duplicate');
Route::get  ('events/{event_id}/activitiesbyhost/{host_id}',      'ActivitiesController@indexByHost');
Route::apiResource('events/{event}/activities', 'ActivitiesController' , ['except' => ['index', 'show']])->middleware('permission:create_activity|update_activity|delete_activity');
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
Route::get('events/{event}/sendpush', 'PushNotificationsController@index');
Route::put('events/{event}/sendpush', 'PushNotificationsController@update')->middleware('permission:update_sendpush');
Route::post('events/{event}/sendpush', 'PushNotificationsController@store')->middleware('permission:create_sendpush');
Route::delete('events/{event}/sendpush/{new}', 'PushNotificationsController@delete')->middleware('permission:delete_sendpush');
Route::get('events/{event}/sendpush/{new}', 'PushNotificationsController@show');

//Route::post('event/{event_id}/sendpush', 'SendContentController@sendPushNotification');
Route::get('event/{event_id}/notifications/{id}', 'PushNotificationsController@indexByUser');



/*******************
 * DOCUMENTS UPLOAD
 ******************/
Route::get('events/{event}/documents', 'DocumentsController@index');
Route::put('events/{event}/documents', 'DocumentsController@update')->middleware('permission:update_documents');
Route::post('events/{event}/documents', 'DocumentsController@store')->middleware('permission:create_documents');
Route::delete('events/{event}/documents/{new}', 'DocumentsController@delete')->middleware('permission:delete_documents');
Route::get('events/{event}/documents/{new}', 'DocumentsController@show');
Route::get('events/{event_id}/getallfiles/', 'DocumentsController@indexFiles');
 

/*******
 * WALL
 ******/
Route::apiResource('events/{event_id}/wall', 'WallController');
 
 

/*******************
 * FAQ'S
 ******************/
Route::get('events/{event}/faqs', 'FaqController@index');
Route::put('events/{event}/faqs', 'FaqController@update')->middleware('permission:update_faqs');
Route::post('events/{event}/faqs', 'FaqController@store')->middleware('permission:create_faqs');
Route::delete('events/{event}/faqs/{new}', 'FaqController@delete')->middleware('permission:delete_faqs');
Route::get('events/{event}/faqs/{new}', 'FaqController@show');

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