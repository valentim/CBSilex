<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;

class Arrival
=======

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Arrival extends AbstractTransferBehavior
>>>>>>> added response objects
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
