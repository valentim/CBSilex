<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Search\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Search\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Search\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\Response\Search\SeatType;
use Clickbus\RestHandler\DataTransfer\Response\Search\Product;

class Parts
{
    public $trip_id;

    public $departure;

    public $arrival;

    public $busCompany;

    public $bus;

    public $waypoints = array();

    public $seatTypes = array();

    public $products = array();

    public $availableSeats;

    public function setTripId($tripId)
    {
        $this->trip_id = $tripId;
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

    public function addWaypoint(Waypoint $waypoint)
    {
        $this->waypoints[] = $waypoint;
    }

    public function addSeatType(SeatType $seatType)
    {
        $this->seatTypes[] = $seatType;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function setAvailableSeats($availableSeats)
    {
        $this->availableSeats = $availableSeats;
    }
}
