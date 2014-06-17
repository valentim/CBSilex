<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Details extends AbstractTransferBehavior
{
    public $price;

    public $currency;

    public $seatTypes;

    public function __construct()
    {
        $this->seatTypes = new \SplObjectStorage;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setSeatType(SeatType $seatType)
    {
        $this->seatTypes->attach($seatType);
    }
}