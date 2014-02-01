<?php
/**
 * @todo fix get Config file not loaded by default ??
 */
$prefix = Config::get('arxmin.prefix', 'arxmin');
$namespace = Config::get('arxmin.namespace', 'Arxmin\\');
$filter = Config::get('arxmin.filter', 'arxminauth');

Route::group(array('before' => 'arxminCheck'), function() use ($namespace, $filter){
    Route::any('/arxmin/install', $namespace.'anyIndex');
    Route::controller('/arxmin/install', $namespace.'InstallController');
});

Route::group(array('prefix' => $prefix), function() use ($namespace, $filter){

    Route::get('/', array('before' => $filter,  'uses' => $namespace.'UserController@login'));
    Route::post('user', $namespace.'UserController@store');
    Route::get('user/login', $namespace.'UserController@login');
    Route::post('user/login', $namespace.'UserController@do_login');
    Route::get('user/confirm/{code}', $namespace.'UserController@confirm');
    Route::get('user/forgot_password', $namespace.'UserController@forgot_password');
    Route::post('user/forgot_password', $namespace.'UserController@do_forgot_password');
    Route::get('user/reset_password/{token}', $namespace.'UserController@reset_password');
    Route::post('user/reset_password', $namespace.'UserController@do_reset_password');
    Route::get('user/logout', $namespace.'UserController@logout');

    Route::when('/my*', $filter);

    Route::controller('my', $namespace.'MyController');

});