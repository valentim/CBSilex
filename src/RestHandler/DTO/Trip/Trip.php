<?php
namespace Clickbus\RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\BusCompany;
use Clickbus\RestHandler\DTO\Trip\Bus;
use Clickbus\RestHandler\DTO\Trip\Seat;

class Trip
{
    public $trip_id;

    public $busCompany;

    public $bus;

    public $seats = array();

    public function setTripId($tripId)
    {
        $this->trip_id = $tripId;
    }

    public function setBusCompany(BusCompany $busCompany)
    {
        $this->busCompany = $busCompany;
    }

    public function setBus(Bus $bus)
    {
        $this->bus = $bus;
    }

    public function addSeat(Seat $seat)
    {
        $this->seats[] = $seat;
    }
}
