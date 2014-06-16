<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:36
 */

namespace RestHandler\DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\Request\Seat\BlockRequest;

class BlockRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testBlockObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\BlockRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat\\BlockRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Seat", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new BlockRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 