<?php
namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class SeatBlock extends AbstractTransferBehavior
{
    public $seat;

    public $schedule;

    public $status;

    public $seatReservation;

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

    public function setSeatReservation($seatReservation)
    {
        $this->seatReservation = $seatReservation;
    }

    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;
    }
}