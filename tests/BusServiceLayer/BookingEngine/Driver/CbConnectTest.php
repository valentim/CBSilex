<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:16
 */

use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;
use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;

class CbConnectTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testCbConnectObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\Driver\\CbConnect", $this->object);
    }

    protected function setUp()
    {
        $filter = new Intersection;
        $this->object = new CbConnect($filter);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 