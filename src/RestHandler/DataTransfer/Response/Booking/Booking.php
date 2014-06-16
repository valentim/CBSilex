<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;

class Booking
{
    public $id;

    public $status;

    public $localizer;

    public $uuid;

    public $payment;

    public $items = array();

    public $createdAt;

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

    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
