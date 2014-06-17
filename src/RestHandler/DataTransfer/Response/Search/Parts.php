<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Parts extends AbstractTransferBehavior
{
    public $tripId;

    public $departure;

    public $arrival;

    public $busCompany;

    public $bus;

    public $waypoints;

    public $seatTypes;

    public $products;

    public $availableSeats;

    public function __construct()
    {
        $this->waypoints = new \SplObjectStorage;
        $this->seatTypes = new \SplObjectStorage;
        $this->products = new \SplObjectStorage;
    }

    public function setTripId($tripId)
    {
        $this->tripId = $tripId;
    }

    public function setDeparture(Departure $departure)
    {
        $this->departure = $departure;
    }

    public function setArrival(Arrival $arrival)
    {
        $this->arrival = $arrival;
    }

    public function setBusCompany(BusCompany $busCompany)
    {
        $this->busCompany = $busCompany;
    }

    public function setBus(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function setWaypoints(Waypoint $waypoint)
    {
        $this->waypoints->attach($waypoint);
    }

    public function setSeatTypes(SeatType $seatType)
    {
        $this->seatTypes->attach($seatType);
    }

    public function setProducts(Product $product)
    {
        $this->products->attach($product);
    }

    public function setAvailableSeats($availableSeats)
    {
        $this->availableSeats = $availableSeats;
    }
}
