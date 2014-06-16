<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:50
 */

namespace RestHandler\DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\Request\Seat\OrderItemRequest;

class OrderItemRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testOrderItemObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\OrderItemRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\OrderItemRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new OrderItemRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 