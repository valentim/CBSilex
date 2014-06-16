<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:37
 */

namespace DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\Request\Seat\ScheduleRequest;

class ScheduleRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testScheduleObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\ScheduleRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat", $this->object->getNamespace());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\ScheduleRequest", $this->object->getData()->name);
    }

    protected function setUp()
    {
        $this->object = new ScheduleRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 