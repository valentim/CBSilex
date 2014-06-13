<?php
namespace Clickbus\RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Waypoint;

class Departure
{
    public $price;

    public $waypoint = array();

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setWaypoint(Waypoint $waypoint)
    {
        $this->waypoint = $waypoint;
    }
}