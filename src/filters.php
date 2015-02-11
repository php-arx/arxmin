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
    if(! \Arxmin\Arxmin::isInstalled() ) {
        return Redirect::to(action('Arxmin\\InstallController@getIndex'));
    }
});

/**
 * Check if Arxmin is not installed to prevent overwriting install
 */
Route::filter('arxmin-check-not-installed', function()
{
    if(Arxmin::isInstalled() ) {
        return Redirect::to(action('Arxmin\\ArxminController@anyLogin'));
    }
});

/**
 * Check if user is logged
 */
Route::filter('arxmin-auth', function()
{
    # 1. Check if user is logged

    if(! Auth::check() ){
        return Redirect::to(action('Arxmin\\ArxminController@anyLogin'));
    } else{

        # Check if user have right to log to arxmin

        $user = Auth::getUser();

        /* @todo fix this stuff !
         * if(!$user->hasRole('SuperAdmin') && !$user->can("access_arxmin")){
            return Redirect::to(action('Arxmin\\ArxminController@anyLogin'))->withErrors(array('can_access_to_arxmin' => 'true'));
        }*/
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

