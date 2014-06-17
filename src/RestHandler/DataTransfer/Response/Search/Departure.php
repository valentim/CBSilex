<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;

class Departure
{
    public $price;

    public $waypoint = array();
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Departure extends AbstractTransferBehavior
{
    public $price;

    public $waypoint;
>>>>>>> added response objects

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setWaypoint(Waypoint $waypoint)
    {
        $this->waypoint = $waypoint;
    }
}