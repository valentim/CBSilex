<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Payment extends AbstractTransferBehavior
{
    public $method;

    public $total;

    public $currency;

    public $status;

    public $meta;

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }
}