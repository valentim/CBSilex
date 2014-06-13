<?php
namespace RestHandler\DTO\SeatBlock;

use Clickbus\RestHandler\DTO\SeatBlock\SeatBlockLock;
use Clickbus\RestHandler\DTO\SeatBlock\Schedule;

class SeatBlockLockTest extends \PHPUnit_Framework_TestCase
{
    protected $seatBlockLock;

    public function setUp()
    {
        $this->seatBlockLock = new SeatBlockLock();
    }

    public function testIntegrity()
    {
        $schedule = new Schedule();

        $this->seatBlockLock->setSeat('12A');
        $this->seatBlockLock->setSchedule($schedule);
        $this->seatBlockLock->setStatus('blocked');
        $this->seatBlockLock->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD');
        $this->seatBlockLock->setExpireAt('2014-10-10 20:35');

        $this->assertInternalType('string', $this->seatBlockLock->seat);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\SeatBlock\Schedule', $this->seatBlockLock->schedule);
        $this->assertInternalType('string', $this->seatBlockLock->status);
        $this->assertInternalType('string', $this->seatBlockLock->sessionId);
        $this->assertInternalType('string', $this->seatBlockLock->expireAt);
    }
}
