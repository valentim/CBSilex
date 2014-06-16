<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Parts;
use Clickbus\RestHandler\DataTransfer\Response\Search\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Search\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Search\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Search\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\Response\Search\SeatType;
use Clickbus\RestHandler\DataTransfer\Response\Search\Product;

class PartsTest extends \PHPUnit_Framework_TestCase
{
    protected $parts;

    public function setUp()
    {
        $this->parts = new Parts();
    }

    public function testIntegrity()
    {
        $departure = new Departure();
        $arrival = new Arrival();
        $busCompany = new BusCompany();
        $bus = new Bus();
        $waypoint = new Waypoint();
        $seatType = new SeatType();
        $product = new Product();

        $this->parts->setTripId(333);
        $this->parts->setDeparture($departure);
        $this->parts->setArrival($arrival);
        $this->parts->setBusCompany($busCompany);
        $this->parts->setBus($bus);
        $this->parts->addWaypoint($waypoint);
        $this->parts->addSeatType($seatType);
        $this->parts->addProduct($product);
        $this->parts->setAvailableSeats(10);

        $this->assertInternalType('int', $this->parts->trip_id);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Departure', $this->parts->departure);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Arrival', $this->parts->arrival);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\BusCompany', $this->parts->busCompany);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Bus', $this->parts->bus);
        $this->assertInternalType('array', $this->parts->waypoints);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint', $this->parts->waypoints[0]);
        $this->assertInternalType('array', $this->parts->seatTypes);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\SeatType', $this->parts->seatTypes[0]);
        $this->assertInternalType('array', $this->parts->products);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Product', $this->parts->products[0]);
        $this->assertInternalType('int', $this->parts->availableSeats);
    }
}
