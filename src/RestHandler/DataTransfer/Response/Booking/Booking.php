<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Booking extends AbstractTransferBehavior
{
    public $id;

    public $status;

    public $localizer;

    public $uuid;

    public $payment;

    public $items;

    public $createdAt;

    public function __construct()
    {
        $this->items = new \SplObjectStorage;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setLocalizer($localizer)
    {
        $this->localizer = $localizer;
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function setItem(Item $item)
    {
        $this->items->attach($item);
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
