<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Departure extends AbstractTransferBehavior
{
    public $price;

    public $waypoint;

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setWaypoint(Waypoint $waypoint)
    {
        $this->waypoint = $waypoint;
    }
}