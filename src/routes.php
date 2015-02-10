<?php

$config = Config::get('arxmin::config');
$auth = Config::get('arxmin::config.auth');

$prefix = $config['prefix'];

$namespace = $config['namespace'];

$filter = $auth['filter'];

$authController = $auth['controller'];

Route::group(array('prefix' => $prefix, 'before' => array('arxmin-check-not-installed')),function() use ($namespace, $filter, $authController){
    Route::controller('install', 'Arxmin\\InstallController');
});

Route::group(array('prefix' => $prefix, 'before' => array('arxmin-check-installed')), function() use ($namespace, $filter, $authController){


    Route::get('login', $authController.'@login');
    Route::post('login', $authController.'@do_login');

    // Confide routes
    Route::get( 'user/create', $authController.'@create');
    Route::post('user', $authController.'@store');
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

    Route::controller('api/v1', $namespace.'ApiController');

    // Confide RESTful route
    Route::get('user/confirm/{code}', $authController.'@getConfirm');
    Route::get('user/reset/{token}', $authController.'@getReset');
    Route::controller( 'user', $authController);

});

Route::group(array('prefix' => $prefix, 'before' => array('arxmin-check', 'arxmin-auth')), function() use ($namespace, $filter, $authController){

    # Protect my route
    Route::when('/module*', $filter);

    Route::controller('module/user', $namespace.'ModuleUserController');

    Route::controller('module/data-manager', $namespace.'ModuleDataManagerController');

    Route::controller('module', $namespace.'ModuleController');

    Route::get('module', $namespace.'ModuleController@anyDashboard');
});