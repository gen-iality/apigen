<?php
/*
|--------------------------------------------------------------------------
| USER Routes
|--------------------------------------------------------------------------
| This is where you can register API routes to manage users in the different modules.
| 
*/

/****************
 * Users
 ****************/
Route::apiResource('users', 'UserController', ['only' => ['index', 'show', 'store']]);

Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
//Se deja la ruta duplicada mientras en el front el cache se actualiza, con ruta 'users'
Route::get('user/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
// Route::apiResource('users', 'UserController', ['only' => ['index', 'show']]);

Route::group(
    ['middleware' => 'auth:token'],
    function () {
        Route::apiResource('users', 'UserController', ['except' => ['index', 'show', 'store']]);
        Route::get('users/currentUser', 'FireBaseAuthController@getCurrentUser');
        // Route::apiResource('users', 'UserController', ['except' => ['index', 'show']]);
        Route::get('users/findByEmail/{email}', 'UserController@findrequireByEmail');
        
        Route::get('organization/{organization}/users', 'UserController@userOrganization');
        Route::get('users/me/totaluser', "UserController@usersOfMyPlan");
        Route::put('users/{user_id}/changeStatusUser', 'UserController@changeStatusUser');
    }
);
Route::post('validateEmail', 'UserController@validateEmail');
Route::post("users/signInWithEmailAndPassword", "UserController@signInWithEmailAndPassword");
Route::get('users/loginorcreatefromtoken', 'UserController@loginorcreatefromtoken');
Route::get('users/findByEmail/{email}', 'UserController@findByEmail');
Route::post('getloginlink', 'UserController@getAccessLink');
Route::get('singinwithemaillink', 'UserController@signInWithEmailLink');
Route::put("changeuserpassword", "UserController@changeUserPassword");
//Change one user password
Route::put("changeOneuserpassword/{user_id}", "UserController@updateOneUserPassword");
//Change many user passwords
Route::put("updatepasswordsbyevent/{event}", "UserController@updatePasswordsByEvent");