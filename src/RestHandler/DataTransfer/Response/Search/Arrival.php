<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Arrival extends AbstractTransferBehavior
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
