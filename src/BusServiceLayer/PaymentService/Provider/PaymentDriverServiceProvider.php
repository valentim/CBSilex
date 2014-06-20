<?php
namespace Clickbus\BusServiceLayer\PaymentService\Provider;

use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Clickbus\BusServiceLayer\PaymentService\PaymentContext;

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
            $this->registerDrivers($paymentType, $drivers, $app);
        }
    }

    /**
     * Register all drivers from a payment type
     *
     * @param string $paymentType
     * @param array $drivers
     * @param \Silex\Application $app
     */
    private function registerDrivers($paymentType, array $drivers, Application $app)
    {
        $parameters = $app['config'];
        
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
            $serviceName = strtolower("payment_gateway_driver_{$paymentType}_{$driver}");

            $app[$serviceName] = new PaymentContext($adapter);
        }
    }

    /**
     * Verify if exists
     *
     * @param  string $class
     * @throws \Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException
     */
    private function verifyExistence($class)
    {
        if (!class_exists($class)) {
            throw new NotExistsServiceException("Service {$class} not exists");
        }
    }

    public function boot(Application $app) {}
}
