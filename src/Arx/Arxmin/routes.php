<?php

Route::get('/arxmin', 'Arx\Arxmin\controllers\RouteController@index');

Route::any('arxmin/login', 'Arx\Arxmin\controllers\UserController@login');

Route::controller('/arxmin/user', 'Arx\Arxmin\controllers\UserController');

Route::controller('/arxmin', 'Arx\Arxmin\controllers\RouteController');

Route::when('/arxmin/home*', 'arxminauth');