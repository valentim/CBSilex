<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\Response\Trip\SeatType;

class Details
{
    public $price;

    public $currency;

    public $seatTypes = array();

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function addSeatType(SeatType $seatType)
    {
        $this->seatTypes[] = $seatType;
    }
}