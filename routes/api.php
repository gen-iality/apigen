<?php

use Illuminate\Http\Request;
use App\Event;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Event EndPoint
Route::get('events', 'EventController@index');
Route::middleware('auth.firebase')->get('events/{id}', 'EventController@show');
Route::post('events', 'EventController@store');
Route::middleware('auth.firebase')->put('events/{id}', 'EventController@update');

//User Events Endpoint
//Route::middleware('cors')->get('user/events', 'OrganizationController@index');
//Route::middleware('cors','auth.firebase')->post('user/events', 'OrganizationController@store');
//Route::middleware('cors','auth.firebase')->put('user/events/{id}', 'OrganizationController@update');
//Route::middleware('cors')->get('user/events/{id}', 'OrganizationController@show');


//Organization EndPoint
/* Route::middleware('cors')->get('organizations', 'OrganizationController@index');
Route::middleware('cors')->post('organizations', 'OrganizationController@store');
Route::middleware('cors')->put('organizations/{id}', 'OrganizationController@update');
Route::middleware('cors')->get('organizations/{id}', 'OrganizationController@show');


//OrganizationUser EndPoint
Route::middleware('cors')->get('organization_users', 'OrganizationUserController@index');
Route::middleware('cors')->post('organization_users', 'OrganizationUserController@store');
Route::middleware('cors')->put('organization_users/{id}', 'OrganizationUserController@update');
Route::middleware('cors')->get('organization_users/{id}', 'OrganizationUserController@show');


//Rol EndPoint
Route::middleware('cors')->get('rols', 'RolController@index');
Route::middleware('cors')->post('rols', 'RolController@store');
Route::middleware('cors')->put('rols/{id}', 'RolController@update');
Route::middleware('cors')->get('rols/{id}', 'RolController@show');


//AttendeTicket EndPoint
Route::middleware('cors')->get('attende_tickets', 'AttendeTicketController@index');
Route::middleware('cors')->post('attende_tickets', 'AttendeTicketController@store');
Route::middleware('cors')->put('attende_tickets/{id}', 'AttendeTicketController@update');
Route::middleware('cors')->get('attende_tickets/{id}', 'AttendeTicketController@show'); */
