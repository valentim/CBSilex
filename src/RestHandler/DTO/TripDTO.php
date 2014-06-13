<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Trip\Trip;

class TripDTO implements Dto
{
    public function __construct(Trip $trip)
    {
        $this->trip_id = $trip->trip_id;
        $this->busCompany = $trip->busCompany;
        $this->bus = $trip->bus;
        $this->seats = $trip->seats;
    }
}