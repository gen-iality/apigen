<?php


/***************
 * Certificates
 ****************/

Route::get('pdfcertificate',"CertificateController@certificatePdf");
Route::post('generatecertificate',"CertificateController@generateCertificate");

Route::get('certificates/{id}', 'CertificateController@destroy');
Route::apiResource('certificates', 'CertificateController', ['only' => ['index', 'show']]);
Route::get('events/{event_id}/certificates', 'CertificateController@indexByEvent');




/****************
 * SPACES
 ****************/
Route::get   ('events/{event_id}/spaces', 'SpaceController@index');
Route::post  ('events/{event_id}/spaces', 'SpaceController@store');
Route::get   ('events/{event_id}/spaces/{id}', 'SpaceController@show');
Route::put   ('events/{event_id}/spaces/{id}', 'SpaceController@update');
Route::delete('events/{event_id}/spaces/{id}', 'SpaceController@destroy');

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
 * USER PROPERTIES
 ****************/
Route::get   ('events/{event_id}/userproperties', 'UserPropertiesController@index');
Route::post  ('events/{event_id}/userproperties', 'UserPropertiesController@store');
Route::get   ('events/{event_id}/userproperties/{id}', 'UserPropertiesController@show');
Route::put   ('events/{event_id}/userproperties/{id}', 'UserPropertiesController@update');
Route::delete('events/{event_id}/userproperties/{id}', 'UserPropertiesController@destroy');


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
 * CATEGORYACTIVITIES (las categorias para las actividades de la agenda)
 ****************/
Route::get   ('events/{event_id}/categoryactivities',      'CategoryActivitiesController@index');
Route::post  ('events/{event_id}/categoryactivities',      'CategoryActivitiesController@store');
Route::get   ('events/{event_id}/categoryactivities/{id}', 'CategoryActivitiesController@show');
Route::put   ('events/{event_id}/categoryactivities/{id}', 'CategoryActivitiesController@update');
Route::delete('events/{event_id}/categoryactivities/{id}', 'CategoryActivitiesController@destroy');



/***************
 * SENDCONTENT 
 ****************/

Route::get('events/{event_id}/sendcontent' , 'SendContentController@index');
Route::post('events/{event_id}/sendemail' , "SendContentController@sendContentGenerated");
Route::post('events/{event_id}/sendcontent' , 'SendContentController@store');
Route::get('events/{event_id}/sendcontent/{id}' , 'SendContentController@show');
Route::put('events/{event_id}/sendcontent/{id}' , 'SendContentController@update');
Route::delete('events/{event_id}/sendcontent/{id}', 'SendContentController@destroy');



/***************
 * INVITATION 
 ****************/

Route::get('events/{event_id}/invitation' , 'InvitationController@index');
Route::post('events/{event_id}/sendinvitation' , "InvitationController@SendInvitation");
Route::post('events/{event_id}/invitation' , 'InvitationController@store');
Route::get('events/{event_id}/invitation/{id}' , 'InvitationController@show');
Route::put('events/{event_id}/invitation/{id}' , 'InvitationController@update');
Route::delete('events/{event_id}/invitation/{id}', 'InvitationController@destroy');



?>