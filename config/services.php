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

/**
 * Doctrine services
 */
// $app->register(new DoctrineServiceProvider(), array(
//     'db.options' => $app['config']['database']
// ));

// $app->register(new DoctrineORMServiceProvider, array(
//     'db.orm.proxies_dir' => __DIR__ . '/cache/doctrine/Proxy',
//     'db.orm.proxies_namespace' => 'DoctrineProxy',
//     'db.orm.auto_generate_proxies' => true,

//     'db.orm.entities' => array(
//         array(
//             'type' => 'annotation',
//             'path' => __DIR__ . '/../src',
//             'namespace' => 'Clickbus\\Entity'
//         )
//     )
// ));

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});
