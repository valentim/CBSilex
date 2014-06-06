<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:16
 */

use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngineService\ServiceProvider;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testServiceProviderObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\BookingEngineService\\ServiceProvider", $this->object);
    }

    protected function setUp()
    {
        $filter = new Intersection;
        $driver = new CbConnect($filter);
        $this->object = new ServiceProvider($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 