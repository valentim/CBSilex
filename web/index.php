<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../config/environment/dev.php';
require __DIR__.'/../config/services.php';

$app->get('/hello/{name}', function($name) use($app) {
    return $app['booking_engine_driver_cbconnect'];
});

$app->run();