<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:16
 */

use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngineService\ServiceProvider;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testServiceProviderObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\BookingEngineService\\ServiceProvider", $this->object);
    }

    protected function setUp()
    {
        $driver = new CbConnect;
        $this->object = new ServiceProvider($driver);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 