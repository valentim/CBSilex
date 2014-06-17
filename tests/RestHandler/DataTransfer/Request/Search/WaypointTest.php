<?php
use Clickbus\RestHandler\DataTransfer\Request\Search\Waypoint;

/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 23:36
 */

class WaypointTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testWaypointObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Search\\Waypoint", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Search\\Waypoint", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Search", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new Waypoint;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 