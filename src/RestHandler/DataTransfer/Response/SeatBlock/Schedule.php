<?php
namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;

class Schedule
{
    public $id;

    public $date;

    public $time;

    public $timezone;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
}