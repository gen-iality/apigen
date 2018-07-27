<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @resource AuthUser
 * This class is in charge of managing auth stuff which is implemented using firebase
 */
class FireBaseAuthController extends Controller
{
    /**
     * 
     * getCurrentUser
     * 
     * returns current user information using valid token send with the request.
     * Token is prosseced by middleware
     *
     * @param Request $request
     * @return User user information using valid token send with the request.
     */
    public function getCurrentUser(Request $request)
    {
        return ($request->get('user'))?$request->get('user'):null;
    }
}
