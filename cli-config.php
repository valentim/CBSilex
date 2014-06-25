<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;

$app = new Application();

require __DIR__ . '/config/services.php';

$entityManager = $app['orm.em'];

return ConsoleRunner::createHelperSet($entityManager);
