<?php

Route::get ('events/{event_id}/eventusers',      'EventUserController@indexar');
Route::get ('events/{event_id}/eventusers/{id}', 'EventUserController@mostrar');

/****************
 * SPACES
 ****************/
Route::get ('events/{event_id}/spaces', 'SpaceController@index');
Route::post ('events/{event_id}/spaces', 'SpaceController@store');
Route::get ('events/{event_id}/spaces/{id}', 'SpaceController@show');
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

Route::apiResource('events/{id}/newsfeed', 'NewsfeedController');

/****************
 * SURVEYS
 ****************/

Route::apiResource('events/{id}/surveys', 'SurveysController');

/****************
 * ACITIVITY ASSISTANTS 
 ****************/

Route::get  ('fillassitantsbug/{id}', 'ActivityAssistantsController@fillassitantsbug');

Route::post  ('events/{event_id}/activity/activity_attendee', 'ActivityAssistantsController@activitieAssistant');
Route::post('events/{event_id}/activity/activity_attendee/{id}', 'ActivityAssistantsController@deleteAssistant');

Route::get   ('events/{event_id}/activity_attendee',      'ActivityAssistantsController@index');
Route::post  ('events/{event_id}/activity_attendee',      'ActivityAssistantsController@store');
Route::get   ('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@show');
Route::put   ('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@update');
Route::delete('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@destroy');


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

/***************
 * TYPE
 ****************/
Route::get   ('events/{event_id}/type',      'TypeController@index');
Route::post  ('events/{event_id}/type',      'TypeController@store');
Route::get   ('events/{event_id}/type/{id}', 'TypeController@show');
Route::put   ('events/{event_id}/type/{id}', 'TypeController@update');
Route::delete('events/{event_id}/type/{id}', 'TypeController@destroy');


/***************
 * ACTIVITYCATEGORIES (las categorias para las actividades de la agenda)
 ****************/
Route::get   ('events/{event_id}/categoryactivities',      'ActivityCategoriesController@index');
Route::post  ('events/{event_id}/categoryactivities',      'ActivityCategoriesController@store');
Route::get   ('events/{event_id}/categoryactivities/{id}', 'ActivityCategoriesController@show');
Route::put   ('events/{event_id}/categoryactivities/{id}', 'ActivityCategoriesController@update');
Route::delete('events/{event_id}/categoryactivities/{id}', 'ActivityCategoriesController@destroy');


/***************
 * TEST API'S
 ****************/
Route::apiResource('testsendrecovery', 'TestEmailRecoveryController',['only' => ['index']]);
Route::post('findbase/findbase/{id}', 'SendContentController@Attendee');
Route::post('saveImagesInStorage' , "SendContentController@saveImagesInStorage");
Route::post("verifyuser","VertifyController@validateUser");


/*******************
 * RECOVERY PASSWORD
 ******************/
Route::post('events/{event_id}/recoverypassword', 'SendContentController@PasswordRecovery');


/********************
 * PUSH NOTIFICATIONS
 ********************/
Route::apiResource('events/{event_id}/sendpush', 'PushNotificationsController');
Route::post('event/{event_id}/sendpush', 'SendContentController@sendPushNotification');
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

?>