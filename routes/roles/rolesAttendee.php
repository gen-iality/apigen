<?php

/*
|--------------------------------------------------------------------------
| API Roles Attendee
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for tha manage for roles to attendee. 
| into events.
*/

/****************
* RolEvent
****************/
Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::get('events/{event}/rolevents', 'RolEventController@index');
        Route::post('events/{event}/rolevents', 'RolEventController@store')->middleware('permission:create');
        Route::get('events/{event}/rolevents/{rolevent}', 'RolEventController@show');              
        Route::put('events/{event}/rolevents/{rolevent}', 'RolEventController@update')->middleware('permission:update');
        Route::delete('events/{event}/rolevents/{rolevent}', 'RolEventController@destroy')->middleware('permission:destroy');
    }
);

Route::group(
    ['middleware' => 'auth:token'], function () {
        Route::post('events/{event}/rolespermissions', 'RolesPermissionsEventController@store');        
    }
);

Route::post('permissions', 'PermissionEventController@store');

