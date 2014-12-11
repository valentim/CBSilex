<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();


require __DIR__ . '/../config/environment/env.php';
require __DIR__ . '/../config/services.php';
require __DIR__ . '/../config/routes.php';
require __DIR__ . '/../config/errors.php';

$app->run();
