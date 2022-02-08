<?php

/*
|--------------------------------------------------------------------------
| ORGANIZATION Routes
|--------------------------------------------------------------------------
| This is where you can register API routes to manage organizations.
| 
*/


/****************
 * Organizations 
 ****************/
Route::get('organizations', 'OrganizationController@index');
Route::get('organizations/{organization}', 'OrganizationController@show');
Route::group(
    ['middleware' => 'auth:token'],
    function () {                
        Route::post('organizations' , 'OrganizationController@store');
        Route::put('organizations/{organization}' , 'OrganizationController@update')->middleware('permission:update');
        Route::delete('organizations/{organization}' , 'OrganizationController@destroy')->middleware('permission:destroy');        
    }
);


/***************
 * USER PROPERTIES ORGANIZATION
 ****************/
Route::get('organizations/{organization}/userproperties', 'OrganizationUserPropertiesController@index');
Route::get('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@show');

Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::post('organizations/{organization}/userproperties', 'OrganizationUserPropertiesController@store')->middleware('permission:create');
        Route::put('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@update')->middleware('permission:update');
        Route::delete('organizations/{organization}/userproperties/{id}', 'OrganizationUserPropertiesController@destroy')->middleware('permission:destroy');
    }
);

/****************
 * Users Organization
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::get('organizations/{organization}/organizationusers', 'OrganizationUserController@index');
        Route::get('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@show');
        Route::put('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@update')->middleware('permissionUser:update');;
        Route::delete('organizations/{organization}/organizationusers/{organizationuser}', 'OrganizationUserController@destroy')->middleware('permission:destroy');
        Route::get('me/organizations', 'OrganizationUserController@meOrganizations');
    }
);
Route::post('organizations/{organization}/addorganizationuser', 'OrganizationUserController@store');
Route::get('organizations/{organization}/events', 'EventController@EventbyOrganizations');
Route::get('organizations/{organization}/eventsstadistics', 'EventStatisticsController@eventsstadistics');


/****************
 * TemplateProperties
 ****************/
Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::get('organizations/{organization}/templateproperties', 'TemplatePropertiesController@index');
        Route::post('organizations/{organization}/templateproperties', 'TemplatePropertiesController@store')->middleware('permission:create');    
        Route::put('organizations/{organization}/templateproperties/{templatepropertie}', 'TemplatePropertiesController@update')->middleware('permission:update');
        Route::delete('organizations/{organization}/templateproperties/{templatepropertie}', 'TemplatePropertiesController@destroy')->middleware('permission:destroy');
        Route::put('events/{event}/templateproperties/{templatepropertie}/addtemplateporperties', 'TemplatePropertiesController@addTemplateEvent');
    }
);

Route::get('comments/organizations/{organization}', 'CommentController@indexByOrganization');
Route::get('categories/organizations/{organization_ids}', 'CategoryController@indexByOrganization');
