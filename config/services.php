<?php
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;
use Clickbus\BusServiceLayer\BookingEngineService\Service\DriverServiceProvider;
use Clickbus\BusServiceLayer\PaymentService\Provider\PaymentDriverServiceProvider;
use Symfony\Component\HttpFoundation\Request;

use DerAlex\Silex\YamlConfigServiceProvider;

use Clickbus\Provider\DoctrineORMServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

/**
 * Registering Yaml service provider
 */
$app->register(new YamlConfigServiceProvider(__DIR__ . '/parameters.yml'));

/**
 * Drivers of Booking Engine
 */
$app->register(new DriverServiceProvider);

/**
 * Drivers of PaymentService
 */
$app->register(new PaymentDriverServiceProvider);


$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});
