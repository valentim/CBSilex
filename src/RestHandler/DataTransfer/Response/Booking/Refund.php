<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Refund extends AbstractTransferBehavior
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