<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| AUTH Routes
|--------------------------------------------------------------------------
|
| Here is where you can register AUTH routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "auth" middleware group. Enjoy building your AUTH!
|
*/

Route::middleware('auth.firebase')->get('currentUser', 'FireBaseAuthController@getCurrentUser');


