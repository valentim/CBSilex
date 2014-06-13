<?php
use Clickbus\DataTransfer\Request\Trip\WaypointRequest;

/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:36
 */

class WaypointRequestTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testWaypointObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\DataTransfer\\Request\\Trip\\WaypointRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Trip\\WaypointRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\DataTransfer\\Request\\Trip", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new WaypointRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 