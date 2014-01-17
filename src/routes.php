<?php

Route::get('/arxmin', 'Arxmin\RouteController@index');

Route::any('arxmin/login', 'Arxmin\UserController@login');

Route::controller('/arxmin/user', 'Arxmin\UserController');

Route::when('/arxmin/home*', 'arxminauth');

Route::group(array('before' => 'arxminCheck'), function(){
    Route::any('/arxmin/install', 'Arxmin\anyIndex');
    Route::controller('/arxmin/install', 'Arxmin\InstallController');
});

Route::group(array('before' => 'arxminauth'), function(){
    Route::controller('/arxmin/dashboard', 'Arxmin\DashboardController');
});

Route::controller('/arxmin', 'Arxmin\RouteController');

Route::controller('arxmintest', 'ArxminController');