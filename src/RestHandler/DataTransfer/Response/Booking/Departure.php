<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Departure extends AbstractTransferBehavior
{
    public $waypoint;

    public $schedule;

    public function setWaypoint($waypoint)
    {
        $this->waypoint = $waypoint;
    }

    public function setSchedule(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
}