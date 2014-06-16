<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule;

class ArrivalTest extends \PHPUnit_Framework_TestCase
{
    protected $arrival;

    public function setUp()
    {
        $this->arrival = new Arrival();
    }

    public function testIntegrity()
    {
        $schedule = new Schedule();

        $this->arrival->setWaypoint(123);
        $this->arrival->setSchedule($schedule);

        $this->assertInternalType('int', $this->arrival->waypoint);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule', $schedule);
    }
}