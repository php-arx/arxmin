<?php
/**
 * @todo fix get Config file
 */
$prefix = Config::get('arxmin.prefix', 'arxmin');

Route::group(array('before' => 'arxminCheck'), function(){
    Route::any('/arxmin/install', 'Arxmin\anyIndex');
    Route::controller('/arxmin/install', 'Arxmin\InstallController');
});

Route::group(array('prefix' => $prefix), function(){

    Route::get('/', 'Arxmin\RouteController@index');

    Route::post('user', 'Arxmin\UserController@store');
    Route::get('user/login', 'Arxmin\UserController@login');
    Route::post('user/login', 'Arxmin\UserController@do_login');
    Route::get('user/confirm/{code}', 'Arxmin\UserController@confirm');
    Route::get('user/forgot_password', 'Arxmin\UserController@forgot_password');
    Route::post('user/forgot_password', 'Arxmin\UserController@do_forgot_password');
    Route::get('user/reset_password/{token}', 'Arxmin\UserController@reset_password');
    Route::post('user/reset_password', 'Arxmin\UserController@do_reset_password');
    Route::get('user/logout', 'Arxmin\UserController@logout');

    Route::when('/my*', 'arxminauth');

});