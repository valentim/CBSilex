<?php
namespace RestHandler\DataTransfer\Response\SeatBlock;

use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\SeatBlock;
use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\Schedule;

class SeatBlockTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlock;

    public function setUp()
    {
        $this->seatBlock = new SeatBlock();
    }

    public function testIntegrity()
    {
        $schedule = new Schedule();

        $this->seatBlock->setSeat('12A');
        $this->seatBlock->setSchedule($schedule);
        $this->seatBlock->setStatus('blocked');
        $this->seatBlock->setSeatReservation('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $this->seatBlock->setExpireAt('2014-10-10 20:35');

        $this->assertInternalType('string', $this->seatBlock->seat);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\SeatBlock\Schedule', $this->seatBlock->schedule);
        $this->assertInternalType('string', $this->seatBlock->status);
        $this->assertInternalType('string', $this->seatBlock->seatReservation);
        $this->assertInternalType('string', $this->seatBlock->expireAt);
    }
}
