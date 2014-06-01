<?php

$arxmin = Config::get('arxmin::arxmin');
$auth = Config::get('arxmin::auth');

$prefix = $arxmin['prefix'];
$namespace = $arxmin['namespace'];

$filter = $auth['filter'];
$authController = $auth['controller'];

Route::group(array('before' => 'arxminCheck'), function() use ($namespace, $filter){
    Route::any('/arxmin/install', $namespace.'anyIndex');
    Route::controller('/arxmin/install', $namespace.'InstallController');
});

Route::group(array('prefix' => $prefix), function() use ($namespace, $filter, $authController){

    // Confide routes
    Route::get( 'user/create',                 $authController.'@create');
    Route::post('user', $authController.'@store');
    Route::get('login', $authController.'@login');
    Route::get('user/login', $authController.'@login');
    Route::post('user/login', $authController.'@do_login');
    Route::get('user/confirm/{code}', $authController.'@confirm');
    Route::get('user/forgot', $authController.'@forgot_password');
    Route::get('user/forgot_password', $authController.'@forgot_password');
    Route::post('user/forgot_password', $authController.'@do_forgot_password');
    Route::get('user/reset_password/{token}', $authController.'@reset_password');
    Route::post('user/reset_password', $authController.'@do_reset_password');
    Route::get('logout', $authController.'@logout');
    Route::get('user/logout', $authController.'@logout');


    // Confide RESTful route
    Route::get('user/confirm/{code}', $authController.'@getConfirm');
    Route::get('user/reset/{token}', $authController.'@getReset');
    Route::controller( 'user', $authController);


    # Protect my route
    Route::when('/my*', $filter);

    Route::controller('my', $namespace.'MyController');

});