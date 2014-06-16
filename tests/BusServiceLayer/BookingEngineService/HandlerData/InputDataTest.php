<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/15/14
 * Time: 13:49
 */

namespace HandlerData;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\InputData;

class InputDataTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testInputDataObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\HandlerData\\InputData", $this->object);
    }

    protected function setUp()
    {
        $this->object = new InputData;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 