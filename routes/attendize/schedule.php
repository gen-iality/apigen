<?php

Route::get   ('events/{event_id}/eventusers',      'EventUserController@indexar');
Route::get   ('events/{event_id}/eventusers/{id}', 'EventUserController@mostrar');

/****************
 * SPACES
 ****************/
Route::get   ('events/{event_id}/spaces', 'SpaceController@index');
Route::post  ('events/{event_id}/spaces', 'SpaceController@store');
Route::get   ('events/{event_id}/spaces/{id}', 'SpaceController@show');
Route::put   ('events/{event_id}/spaces/{id}', 'SpaceController@update');
Route::delete('events/{event_id}/spaces/{id}', 'SpaceController@destroy');


/****************
 * ACITIVITY 
 ****************/

Route::post  ('events/{event_id}/activity/activity_attendee', 'ActivityAssistantsController@activitieAssistant');
Route::delete('events/{event_id}/activity/activity_attendee', 'ActivityAssistantsController@deleteAssistant');

Route::get   ('events/{event_id}/activity_attendee',      'ActivityAssistantsController@index');
Route::post  ('events/{event_id}/activity_attendee',      'ActivityAssistantsController@store');
Route::get   ('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@show');
Route::put   ('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@update');
Route::delete('events/{event_id}/activity_attendee/{id}', 'ActivityAssistantsController@destroy');


/***************
 * HOST
 * 
 * rutas para guardar la agenda de los eventos
 ****************/

Route::get   ('events/{event_id}/host',      'HostController@index');
Route::post  ('events/{event_id}/host',      'HostController@store');
Route::get   ('events/{event_id}/host/{id}', 'HostController@show');
Route::put   ('events/{event_id}/host/{id}', 'HostController@update');
Route::delete('events/{event_id}/host/{id}', 'HostController@destroy');


/***************
 * ACTIVITIES
 ****************/
Route::get   ('events/{event_id}/activities',      'ActivitiesController@index');
Route::post  ('events/{event_id}/activities',      'ActivitiesController@store');
Route::get   ('events/{event_id}/activities/{id}', 'ActivitiesController@show');
Route::put   ('events/{event_id}/activities/{id}', 'ActivitiesController@update');
Route::delete('events/{event_id}/activities/{id}', 'ActivitiesController@destroy');


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

?>