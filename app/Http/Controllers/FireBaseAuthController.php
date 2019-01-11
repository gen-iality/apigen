<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
     * @return Account user information using valid token send with the request.
     */
    public function getCurrentUser(Request $request)
    {
        return (Auth::user()?Auth::user():null);
    }
}
