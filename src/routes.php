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

Route::group(array('prefix' => $prefix), function() use ($namespace, $filter, $authController){


    Route::get('login', $authController.'@login');
    Route::post('login', $authController.'@do_login');

    Route::get('logout', $authController.'@logout');
    Route::get('user/logout', $authController.'@logout');

    Route::controller('api/v1', $namespace.'ApiController');

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

Route::controller('packages', 'Arx\\AssetsController');