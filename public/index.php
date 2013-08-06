<?php

require __DIR__ . '/../../../../vendor/autoload.php';

$app = new Arx();

$app->bootstrap();

$app->run();

$app->shutdown();