<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule;

class ScheduleTest extends \PHPUnit_Framework_TestCase
{
    protected $schedule;

    public function setUp()
    {
        $this->schedule = new Schedule();
    }

    public function testIntegrity()
    {
        $this->schedule->setId(12);
        $this->schedule->setDate('2014-10-31');
        $this->schedule->setTime('10:00');
        $this->schedule->setTimezone('America/Sao_Paulo');

        $this->assertInternalType('int', $this->schedule->id);
        $this->assertInternalType('string', $this->schedule->date);
        $this->assertInternalType('string', $this->schedule->time);
        $this->assertInternalType('string', $this->schedule->timezone);
    }
}