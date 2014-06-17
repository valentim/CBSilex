<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
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
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Parts extends AbstractTransferBehavior
{
    public $tripId;
>>>>>>> added response objects

    public $departure;

    public $arrival;

    public $busCompany;

    public $bus;

<<<<<<< HEAD
    public $waypoints = array();

    public $seatTypes = array();

    public $products = array();

    public $availableSeats;

    public function setTripId($tripId)
    {
        $this->trip_id = $tripId;
=======
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
>>>>>>> added response objects
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

<<<<<<< HEAD
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
=======
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
>>>>>>> added response objects
    }

    public function setAvailableSeats($availableSeats)
    {
        $this->availableSeats = $availableSeats;
    }
}
