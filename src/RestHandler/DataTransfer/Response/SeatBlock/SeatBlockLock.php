<?php
namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;

use Clickbus\RestHandler\DataTransfer\Response\SeatBlock\Schedule;

class SeatBlockLock
{
    public $seat;

    public $schedule;

    public $status;

    public $sessionId;

    public $expireAt;

    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    public function setSchedule(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;
    }
}