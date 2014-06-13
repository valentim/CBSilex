<?php
namespace Clickbus\RestHandler\DTO\Search;

class Prices
{
    public $waypoint;

    public $price;

    public function setWaypoint($waypoint)
    {
        $this->waypoint = $waypoint;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}