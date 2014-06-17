<?php
namespace Clickbus\BusServiceLayer\BookingEngineService\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Clickbus\BusServiceLayer\BookingEngineService\Service\ServiceProvider;
use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException;

class DriverServiceProvider implements ServiceProviderInterface
{
    const DRIVER_NAMESPACE = 'Clickbus\\BusServiceLayer\\BookingEngineService\\Driver\\';

    /**
     * Register provider
     * 
     * @param  \Silex\Application $app
     */
    public function register(Application $app)
    {
        $bookingEngines = $app['config']['booking_engines'];

        foreach ($bookingEngines as $driver) {
            $driverName = self::DRIVER_NAMESPACE . "{$driver}";
            $this->verifyExistence($driverName);

            $config = array();
            if (isset($app['config'][$driver])) {
                $config = $app['config'][$driver];
            }

            $driverObject = new $driverName($config);
            $serviceName = strtolower("booking_engine_driver_{$driver}");
            $app[$serviceName] = new ServiceProvider($driverObject);
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
