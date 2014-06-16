<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

class Refund
{
    public $type;

    public $total;

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}