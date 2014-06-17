<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Trip extends AbstractTransferBehavior
{
    public $trip_id;

    public $busCompany;

    public $bus;

    public $seats;

    public function __construct()
    {
        $this->seats = new \SplObjectStorage;
    }

    public function setTrip_id($tripId)
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

    public function setSeats(Seat $seat)
    {
        $this->seats->attach($seat);
    }
}
