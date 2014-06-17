<?php
namespace RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\Trip;
use Clickbus\RestHandler\DataTransfer\Response\Trip\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Seat;

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

        $this->trip->setTrip_id(40123);
        $this->trip->setBusCompany($busCompany);
        $this->trip->setBus($bus);
        $this->trip->setSeats($seat);

        $this->trip->seats->rewind();
        $this->assertInternalType('int', $this->trip->trip_id);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Trip\BusCompany', $this->trip->busCompany);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Trip\Bus', $this->trip->bus);
        $this->assertInstanceOf('SplObjectStorage', $this->trip->seats);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Trip\Seat', $this->trip->seats->current());
    }
}
