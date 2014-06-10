<?php
use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\RapidoOchoa;
use Clickbus\BusServiceLayer\BookingEngineService\Service\ServiceProvider;
use Clickbus\BusServiceLayer\PaymentService\PaymentContext;
use Clickbus\BusServiceLayer\PaymentService\Adapter\CreditCardAdapter;
use Clickbus\BusServiceLayer\PaymentService\Driver\BankSlip\MundiPagg as MundiPaggBankSlip;
use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard\MundiPagg as MundiPaggCreditCard;
use Clickbus\BusServiceLayer\PaymentService\Driver\BankTransfer\Moip;
use Clickbus\BusServiceLayer\PaymentService\Adapter\BankTransferAdapter;
use Clickbus\BusServiceLayer\PaymentService\Adapter\BankSlipAdapter;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;

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
 * Drivers of PaymentService
 */
$app['payment_gateway_driver_creditcard_mundipagg'] = $app->share(function () {
    $driver = new MundiPaggCreditCard();
    $adapter = new CreditCardAdapter($driver);

    return new PaymentContext($adapter);
});

$app['payment_gateway_driver_banktransfer_moip'] = $app->share(function () {
    $driver = new Moip();
    $adapter = new BankTransferAdapter($driver);

    return new PaymentContext($adapter);
});

$app['payment_gateway_driver_bankSlip_mundipagg'] = $app->share(function () {
    $driver = new MundiPaggBankSlip();
    $adapter = new BankSlipAdapter($driver);

    return new PaymentContext($adapter);
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
