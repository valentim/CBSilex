<?php
namespace Clickbus\BusServiceLayer\PaymentService\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Clickbus\BusServiceLayer\PaymentService\PaymentContext;
use Clickbus\BusServiceLayer\PaymentService\Provider\NotExistsServiceException;

class PaymentDriverServiceProvider implements ServiceProviderInterface
{
    const DRIVER_NAMESPACE = 'Clickbus\\BusServiceLayer\\PaymentService\\Driver\\';
    const ADAPTER_NAMESPACE = 'Clickbus\\BusServiceLayer\\PaymentService\\Adapter\\';

    /**
     * Register provider
     * 
     * @param  \Silex\Application $app
     */
    public function register(Application $app)
    {
        $payments = $app['config']['payments'];

        foreach ($payments as $paymentType => $drivers) {
            $this->registerDrivers($paymentType, $drivers, $app['config']);
        }
    }

    /**
     * Register all drivers from a payment type
     *
     * @param string $paymentType
     * @param array $drivers
     */
    private function registerDrivers($paymentType, array $drivers, $parameters)
    {
        foreach ($drivers as $driver) {
            $driverName = self::DRIVER_NAMESPACE . "{$paymentType}\\{$driver}";
            $this->verifyExistence($driverName);

            $adapterName = self::ADAPTER_NAMESPACE . "{$paymentType}Adapter";
            $this->verifyExistence($adapterName);

            $config = array();
            if (isset($parameters[$driver])) {
                $config = $parameters[$driver];
            }

            $driverObject = new $driverName($config);
            $adapter = new $adapterName($driverObject);

            $app["payment_gateway_driver_{$paymentType}_{$driver}"] = new PaymentContext($adapter);
        }
    }

    /**
     * Verify if exists
     * 
     * @param  string $class
     */
    private function verifyExistence($class)
    {
        if (!class_exists($class)) {
            throw new NotExistsServiceException("Service {$class} not exists");
        }
    }

    public function boot(Application $app) {}
}
