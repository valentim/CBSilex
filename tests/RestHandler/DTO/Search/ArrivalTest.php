<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Departure;
use Clickbus\RestHandler\DTO\Search\Waypoint;

class ArrivalTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Waypoint', $this->departure->waypoint);
    }
}
