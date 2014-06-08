<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:48
 */

namespace HandlerData;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataDTO;

class DataDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testDataDTOExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\HandlerData\\DataDTO", $this->object);
    }

    protected function setUp()
    {
        $this->object = new DataDTO;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 