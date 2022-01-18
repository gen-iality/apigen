<?php

/****************
 * SPACES
 ****************/

Route::get ('events/{event}/spaces', 'SpaceController@index');
Route::get ('events/{event}/spaces/{space}', 'SpaceController@show');
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post ('events/{event}/spaces', 'SpaceController@store')->middleware('permission:create');
        Route::put ('events/{event}/spaces/{space}', 'SpaceController@update')->middleware('permission:update');
        Route::delete('events/{event}/spaces/{space}', 'SpaceController@destroy')->middleware('permission:destroy');
    }
);


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

Route::get('events/{event_id}/host' , 'HostController@index');
Route::get('events/{event_id}/host/{host}' , 'HostController@show');
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event_id}/host' , 'HostController@store')->middleware('permission:create');
        Route::put('events/{event_id}/host/{host}' , 'HostController@update')->middleware('permission:update');
        Route::delete('events/{event_id}/host/{host}' , 'HostController@destroy')->middleware('permission:destroy');
    }
);

/***************
 * ACTIVITIES
 ****************/

Route::post  ('/meetingrecording',      'ActivitiesController@storeMeetingRecording');
Route::post  ('events/{event_id}/duplicateactivitie/{id}',      'ActivitiesController@duplicate');
Route::get  ('events/{event_id}/activitiesbyhost/{host_id}',      'ActivitiesController@indexByHost');
Route::post  ('events/{event_id}/createmeeting/{id}', 'ActivitiesController@createMeeting');
Route::put('events/{event_id}/activities/{id}/hostAvailability' ,  'ActivitiesController@hostAvailability');
Route::post   ('events/{event_id}/activities/{id}/register_and_checkin_to_activity',  'ActivitiesController@registerAndCheckInActivity');
Route::put('events/{event_id}/activities/mettings_zoom/{meeting_id}' ,  'ActivitiesController@deleteVirtualSpaceZoom');

Route::get('events/{event}/activities','ActivitiesController@index');
        Route::get('events/{event}/activities/{activitie}','ActivitiesController@show');
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/activities/{activity}/checkinbyadmin',  'ActivitiesController@checkinbyadmin')->middleware('permission:create_checkinbyadmin');
        //CRUD
        
        Route::post('events/{event}/activities','ActivitiesController@store')->middleware('permission:create');
        Route::put('events/{event}/activities/{activitie}','ActivitiesController@update')->middleware('permission:update');
        Route::delete('events/{event}/activities/{activitie}','ActivitiesController@destroy')->middleware('permission:destroy');
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

Route::get('events/{event}/faqs' , 'FaqController@index');
Route::get('events/{event}/faqs/{faqs}' , 'FaqController@show');
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/faqs' , 'FaqController@store')->middleware('permission:create');
        Route::put('events/{event}/faqs/{faqs}' , 'FaqController@update')->middleware('permission:update');
        Route::delete('events/{event}/faqs/{faqs}' , 'FaqController@destroy')->middleware('permission:destroy');
    }
);


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
