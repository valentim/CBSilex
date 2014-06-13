<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:39
 */

namespace DataTransfer\Request\Seat;


use Clickbus\DataTransfer\Request\Seat\PassengerRequest;

class PassengerRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testPassengerObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\DataTransfer\\Request\\Seat\\PassengerRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Seat\\PassengerRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Seat", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new PassengerRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 