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

    /**
     * @dataProvider inputProvider
     */
    public function testIntersectionFilterMethod($inputData, $ownData, $expectedFilteredData)
    {
        $filteredData = $this->object->filter($inputData, $ownData);
        $this->assertEquals($filteredData, $expectedFilteredData);
    }

    public function inputProvider()
    {
        return [
            [
                [
                    'meta' => [],
                    'request' => [
                        'from' => 'Terminal do Tiete',
                        'to' => 'Rio de Janeiro - Galeão',
                        'departure' => '2010-10-10',
                        'quantity' => 2,
                        'return' => '2010-11-10',
                        'waypoints' => [],
                        'locale' => 'pt_BR',
                        'flexibleDates' => true,
                        'otherData' => 'asa',
                        'other' => 'as'
                    ]
                ],
                [
                    'from' => null,
                    'to' => null,
                    'departure' => null,
                    'quantity' => null,
                    'return' => null,
                    'waypoints' => null,
                    'locale' => null,
                    'flexibleDates' => null
                ],
                [
                    'meta' => [],
                    'request' => [
                        'from' => 'Terminal do Tiete',
                        'to' => 'Rio de Janeiro - Galeão',
                        'departure' => '2010-10-10',
                        'quantity' => 2,
                        'return' => '2010-11-10',
                        'waypoints' => [],
                        'locale' => 'pt_BR',
                        'flexibleDates' => true
                    ]
                ]

            ]
        ];
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
 