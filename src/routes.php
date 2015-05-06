<?php

$config = Config::get('arxmin');

$auth = Config::get('arxmin.auth');

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

    Route::controller( 'user', $authController);

    Route::controller('api/v1', 'Arxmin\\ApiController');

});

/**
 * Auth protected route
 */
Route::group(array('prefix' => $prefix, 'namespace' => 'Arxmin', 'before' => ['arxmin-auth', 'arxmin-check-installed']), function() use ($namespace, $filter, $authController){

    $segments = Request::segments();

    Route::controller('module/user', 'ModuleUserController');

    Route::controller('module/data-manager', 'ModuleDataManagerController');

    Route::controller('module/structure', 'ModuleStructureController');

    Route::controller('module', 'ModuleController');

    # Index
    Route::any('module', 'ModuleController@anyDashboard');
});

Route::controller('packages', 'Arx\\AssetsController');