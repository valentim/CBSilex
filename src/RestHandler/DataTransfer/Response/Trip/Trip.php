<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Seat;

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
