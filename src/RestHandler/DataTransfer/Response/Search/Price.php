<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Price extends AbstractTransferBehavior
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