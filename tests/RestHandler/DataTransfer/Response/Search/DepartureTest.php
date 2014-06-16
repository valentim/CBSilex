<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;

class DepartureTest extends \PHPUnit_Framework_TestCase
{
    protected $departure;

    public function setUp()
    {
        $this->departure = new Departure();
    }

    public function testIntegrity()
    {
        $waypoint = new Waypoint();

        $this->departure->setPrice(9000);
        $this->departure->setWaypoint($waypoint);

        $this->assertInternalType('int', $this->departure->price);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint', $this->departure->waypoint);
    }
}