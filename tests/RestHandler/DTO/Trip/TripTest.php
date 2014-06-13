<?php
namespace RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\Trip;
use Clickbus\RestHandler\DTO\Trip\BusCompany;
use Clickbus\RestHandler\DTO\Trip\Bus;
use Clickbus\RestHandler\DTO\Trip\Seat;

class TripTest extends \PHPUnit_Framework_TestCase
{
    protected $trip;

    public function setUp()
    {
        $this->trip = new Trip();
    }

    public function testIntegrity()
    {
        $busCompany = new BusCompany();
        $bus = new Bus();
        $seat = new Seat();

        $this->trip->setTripId(40123);
        $this->trip->setBusCompany($busCompany);
        $this->trip->setBus($bus);
        $this->trip->addSeat($seat);

        $this->assertInternalType('int', $this->trip->trip_id);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Trip\BusCompany', $this->trip->busCompany);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Trip\Bus', $this->trip->bus);
        $this->assertInternalType('array', $this->trip->seats);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Trip\Seat', $this->trip->seats[0]);
    }
}
