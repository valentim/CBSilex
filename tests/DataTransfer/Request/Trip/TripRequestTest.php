<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 14:09
 */

use Clickbus\RestHandler\DataTransfer\Request\Trip\TripRequest;

class TripRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testTripObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\DataTransfer\\Request\\Trip\\TripRequest", $this->object);
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf("ReflectionClass", $this->object->getData());
    }

    public function testGetData()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Trip\\TripRequest", $this->object->getData()->name);
    }

    public function testNamespaceReturn()
    {
        $this->assertSame("Clickbus\\RestHandler\DataTransfer\\Request\\Trip", $this->object->getNamespace());
    }

    protected function setUp()
    {
        $this->object = new TripRequest;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 