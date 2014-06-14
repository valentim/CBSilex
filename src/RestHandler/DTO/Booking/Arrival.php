<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Schedule;

class Arrival
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