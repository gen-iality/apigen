<?php
/*
|--------------------------------------------------------------------------
| Group Organization
|--------------------------------------------------------------------------
| This is where you can register API routes to manage group organization in the different modules.
|
*/

/****************
 * Group Organization
 ****************/

Route::get('organizations/{organizationId}/groups', 'GroupOrganizationController@index');
Route::post('organizations/{organizationId}/groups', 'GroupOrganizationController@store');
Route::get('organizations/{organizationId}/groups/{groupOrganization}', 'GroupOrganizationController@show');
Route::put('organizations/{organizationId}/groups/{groupOrganization}', 'GroupOrganizationController@update');

Route::delete(
    'organizations/{organizationId}/groups/{groupOrganization}/organizationUsers/{organizationUser}',
    'GroupOrganizationController@deleteOrganizationUser'
);

Route::delete('organizations/{organizationId}/groups/{groupOrganization}', 'GroupOrganizationController@destroy');
