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

    # Redirect homepage to first link in the menu or Login
    Route::any('/', 'ArxminController@anyIndex');
});

// Special auto Assets injector //if not published will autoload assets in public
Route::controller('/packages', '\\Arx\\AssetsController');
Route::controller('/modules', '\\Arxmin\\AssetsController');