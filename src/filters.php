<?php

use Arxmin\Arxmin;

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/**
 * Check if installation is OK
 */
Route::filter('arxmin-check-installed', function()
{
    if(!Arxmin::isInstalled() ) {
        return Redirect::to('arxmin/install');
    }
});

/**
 * Check if Arxmin is not installed to prevent overwriting install
 */
Route::filter('arxmin-check-not-installed', function()
{
    if(Arxmin::isInstalled() ) {
        return Redirect::to('arxmin/login')->with('notification', Lang::get('already installed'));
    }
});

/**
 * Check if user is logged
 */
Route::filter('arxmin-auth', function()
{
    # 1. Check if user is logged
    if(!Auth::driver('arxmin')->check()){
        return Redirect::to('arxmin/login');
    } else{
        global $arxminUser, $arxminAuth;
        $arxminAuth = true;
        $arxminUser = Auth::driver('arxmin')->getUser();
    }
});

/**
 * Check csrf token
 */
Route::filter('arxmin-csrf', function()
{
    if (Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

