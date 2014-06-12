<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:16
 */

use Clickbus\BusServiceLayer\BookingEngineService\Driver\CbConnect;

class CbConnectTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testCbConnectObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\Driver\\CbConnect", $this->object);
    }

    protected function setUp()
    {
        $this->object = new CbConnect;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 