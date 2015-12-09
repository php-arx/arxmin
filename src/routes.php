<?php

/**
 * Get Arxmin configuration
 */
$config = Config::get('arxmin');

$auth = Config::get('arxmin.auth');

$prefix = $config['prefix'];

$namespace = $config['namespace'];

$filter = $auth['filter'];

$authController = $auth['controller'];

/**
 * Access to install only if project is not already configured
 */
Route::group(array('prefix' => $prefix, 'before' => ['arxmin-check-not-installed']),
    function () use ($namespace, $filter, $authController) {
        Route::controller('install', 'Arxmin\\InstallController');
    });

/**
 * Non Auth protected route
 */
Route::group(array('prefix' => $prefix), function () use ($namespace, $filter, $authController) {

    Route::get('login', $authController . '@getLogin');
    Route::post('login', $authController . '@postLogin');

    Route::get('logout', $authController . '@getLogout');
    Route::get('auth/logout', $authController . '@getLogout');

    Route::controller('auth', $authController);

    # Somes endpoint might or need to be protected with Middleware => @see ApiController
    Route::controller('api/v1', 'Arxmin\\ApiController');
});

/**
 * Auth protected route
 */
Route::group(array('prefix' => $prefix, 'namespace' => 'Arxmin', 'before' => ['arxmin-check-installed']), function () use ($namespace, $filter, $authController) {

    Route::controller('/config', 'ConfigController');
    Route::controller('/manage', 'ManageController');

    # Assets interceptors and file-resolvers
    Route::controller('/packages', '\\Arx\\AssetsController');

    # Redirect homepage to first link in the menu
    Route::any('/', 'ArxminController@anyIndex');
});

// Auto Assets injector
Route::controller('/packages', '\\Arx\\AssetsController');
Route::controller('/modules', '\\Arxmin\\AssetsController');