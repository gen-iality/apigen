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
        Route::get('events/{event}/rolespermissions', 'RolesPermissionsEventController@index')->middleware('permission:read'); 
        Route::get('events/{event}/rolespermissions/{rolpermission}', 'RolesPermissionsEventController@index')->middleware('permission:read'); 
        Route::post('events/{event}/rolespermissions', 'RolesPermissionsEventController@store')->middleware('permission:create'); 
        Route::put('events/{event}/rolespermissions/{rolpermission}', 'RolesPermissionsEventController@update')->middleware('permission:update');        
        Route::delete('events/{event}/rolespermissions/{rolpermission}', 'RolesPermissionsEventController@update')->middleware('permission:destroy');                
    }
);

Route::post('permissions', 'PermissionEventController@store');

