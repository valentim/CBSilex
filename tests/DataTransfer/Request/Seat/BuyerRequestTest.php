<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:38
 */

namespace DataTransfer\Request\Seat;


use Clickbus\DataTransfer\Request\Seat\BuyerRequest;

class BuyerRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testBuyerObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\DataTransfer\\Request\\Seat\\BuyerRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Seat\\BuyerRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Seat", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new BuyerRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 