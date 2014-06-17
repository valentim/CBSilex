<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:39
 */

namespace RestHandler\DataTransfer\Request\Seat;

use Clickbus\RestHandler\DataTransfer\Request\Booking\Booking;

class BookingTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testPassengerObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Booking\\Booking", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Booking\\Booking", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Booking", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new Booking;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 