<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\Debug\ErrorHandler;

$app = new Application();

ErrorHandler::register();

require __DIR__ . '/../config/environment/dev.php';
require __DIR__ . '/../config/services.php';
require __DIR__ . '/../config/routes.php';
require __DIR__ . '/../config/errors.php';

$app->run();
