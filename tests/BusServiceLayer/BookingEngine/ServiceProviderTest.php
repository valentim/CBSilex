<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:16
 */

use Clickbus\BusServiceLayer\BookingEngine\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngine\ServiceProvider;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testServiceProviderObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\BookingEngine\\ServiceProvider", $this->object);
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
 