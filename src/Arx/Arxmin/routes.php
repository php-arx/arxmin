<?php

Route::any('arxmin/login', 'Arx\Arxmin\controllers\Route@login');

Route::any('arxmin/home/{param1?}/{param2?}/{param3?}/{param4?}/{param5?}', 'Arx\Arxmin\controllers\Route@home');

Route::resource('arxmin', 'Arx\Arxmin\controllers\Route');

Route::when('arxmin/*', 'arxminauth');