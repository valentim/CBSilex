<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 3:32
 */

namespace HandlerData;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\Intersection;

class IntersectionTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testIntersectionObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\HandlerData\\Intersection", $this->object);
    }

    public function testIntersectionFilterMethod()
    {
        $inputData = ['foo' => [], 'bar' => 'nd', 'piccolo' => 'daimao'];
        $ownData = ['piccolo' => null, 'kakaroto' => null];

        $filteredData = $this->object->filter($inputData, $ownData);
        $expectedFilteredData = ['piccolo' => 'daimao'];

        $this->assertEquals($filteredData, $expectedFilteredData);
    }

    protected function setUp()
    {
        $this->object = new Intersection;
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 