<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Silex\Application;
 
$app = new Application();

require __DIR__.'/../config/environment/dev.php';
require __DIR__.'/../config/services.php';

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader = new YamlFileLoader(new FileLocator(__DIR__ . '/../app/config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);
 
    return $routes;
});

$app->run();
