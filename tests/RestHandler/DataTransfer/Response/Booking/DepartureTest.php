<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule;

class DepartureTest extends \PHPUnit_Framework_TestCase
{
    protected $departure;

    public function setUp()
    {
        $this->departure = new Departure();
    }

    public function testIntegrity()
    {
        $schedule = new Schedule();

        $this->departure->setWaypoint(113);
        $this->departure->setSchedule($schedule);
    }
}