<?php
use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\RapidoOchoa;
use Clickbus\BusServiceLayer\BookingEngineService\Service\ServiceProvider;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;
use Clickbus\BusServiceLayer\PaymentService\Provider\PaymentDriverServiceProvider;

use DerAlex\Silex\YamlConfigServiceProvider;

use Clickbus\Provider\CountryServiceProvider;
use Clickbus\Provider\DoctrineORMServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

/**
 * Drivers of Booking Engine
 */
$app['booking_engine_driver_cbconnect'] = $app->share(function () {
    $filter = new Intersection;
    $bookingEngine = new CbConnect($filter);
    return new ServiceProvider($bookingEngine);
});

$app['booking_engine_driver_rapidoochoa'] = $app->share(function () {
    $filter = new Intersection;
    $bookingEngine = new RapidoOchoa($filter);
    return new ServiceProvider($bookingEngine);
});

/**
 * Registering country from call
 */
$app->register(new CountryServiceProvider());

/**
 * Registering Yaml service provider
 */
$app->register(new YamlConfigServiceProvider(__DIR__ . '/parameters.yml'));

/**
 * Drivers of PaymentService
 */
$app->register(new PaymentDriverServiceProvider());

/**
 * Doctrine services
 */
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => $app['config']['database'][$app['country']]
));

$app->register(new DoctrineORMServiceProvider(), array(
    'db.orm.proxies_dir' => __DIR__ . '/cache/doctrine/Proxy',
    'db.orm.proxies_namespace' => 'DoctrineProxy',
    'db.orm.auto_generate_proxies' => true,

    'db.orm.entities' => array(
        array(
            'type' => 'annotation',
            'path' => __DIR__ . '/../src',
            'namespace' => 'Clickbus\\Entity'
        )
    )
));
