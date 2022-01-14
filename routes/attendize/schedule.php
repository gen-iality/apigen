<?php

/****************
 * SPACES
 ****************/

Route::get ('events/{event}/spaces', 'SpaceController@index')->middleware('cacheResponse');
Route::post ('events/{event}/spaces', 'SpaceController@store');
Route::get ('events/{event}/spaces/{id}', 'SpaceController@show')->middleware('cacheResponse');
Route::put ('events/{event}/spaces/{id}', 'SpaceController@update');
Route::delete('events/{event}/spaces/{id}', 'SpaceController@destroy');


/****************
 * APP CONFIGURATION
 ****************/
Route::apiResource('event/{id}/configuration', 'AppConfigurationController');
Route::delete('event/{id}/configuration', 'AppConfigurationController@destroy');


/****************
 * EVIUS STYLES
 ****************/
Route::apiResource('events/{event}/styles', 'StylesController');

Route::get('events/{event}/stylestemp', 'StylesController@indexTemp');


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
Route::put('events/{event}/questionedit/{id}', 'SurveysController@updatequestions');


/***************
 * HOST
 * rutas para guardar la agenda de los eventos
 ****************/

Route::post  ('events/{event}/duplicatehost/{id}','HostController@duplicate');
Route::apiResource('events/{event}/host', 'HostController');

/***************
 * ACTIVITIES
 ****************/

Route::post  ('/meetingrecording',      'ActivitiesController@storeMeetingRecording');
Route::post  ('events/{event}/duplicateactivitie/{id}',      'ActivitiesController@duplicate');
Route::get  ('events/{event}/activitiesbyhost/{host_id}',      'ActivitiesController@indexByHost');
Route::apiResource('events/{event}/activities', 'ActivitiesController');
Route::post  ('events/{event}/createmeeting/{id}', 'ActivitiesController@createMeeting');
Route::put('events/{event}/activities/{id}/hostAvailability' ,  'ActivitiesController@hostAvailability');
Route::post   ('events/{event}/activities/{id}/register_and_checkin_to_activity',  'ActivitiesController@registerAndCheckInActivity');
Route::put('events/{event}/activities/mettings_zoom/{meeting_id}' ,  'ActivitiesController@deleteVirtualSpaceZoom');

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/activities/{activity}/checkinbyadmin',  'ActivitiesController@checkinbyadmin')->middleware('permission:create_checkinbyadmin');
    }
);

/***************
 * TYPE
 ****************/
Route::apiResource('events/{event}/type','TypeController');

/***************
 * ACTIVITYCATEGORIES (las categorias para las actividades de la agenda)
 ****************/
Route::apiResource('events/{event}/categoryactivities',      'ActivityCategoriesController');

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
Route::post('events/{event}/recoverypassword', 'SendContentController@PasswordRecovery');


/********************
 * PUSH NOTIFICATIONS
 ********************/
Route::apiResource('events/{event}/sendpush', 'PushNotificationsController');
//Route::post('event/{event}/sendpush', 'SendContentController@sendPushNotification');
Route::get('event/{event}/notifications/{id}', 'PushNotificationsController@indexByUser');



/*******************
 * DOCUMENTS UPLOAD
 ******************/
Route::apiResource('events/{event}/documents', 'DocumentsController');
Route::get('events/{event}/getallfiles/', 'DocumentsController@indexFiles');
 

/*******
 * WALL
 ******/
Route::apiResource('events/{event}/wall', 'WallController');
 
 

/*******************
 * FAQ'S
 ******************/
Route::apiResource('events/{id}/faqs', 'FaqController');
Route::post ('events/{event}/duplicatefaqs/{id}','FaqController@duplicate');

//TEST 
Route::put('events/{id}/zoomhost', 'ZoomHostController@update');
Route::post('events/zoomhost', 'ZoomHostController@updateStatus');
Route::get('events/zoomhost', 'ZoomHostController@index');

/*******
 * RSVP
 ******/
 Route::post("events/{event}/wallnotifications", "RSVPController@wallActivity")

?>
