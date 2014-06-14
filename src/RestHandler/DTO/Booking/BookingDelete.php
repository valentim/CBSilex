<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\PaymentDelete;
use Clickbus\RestHandler\DTO\Booking\DeleteItem;

class BookingDelete
{
    public $id;

    public $status;

    public $localizer;

    public $payment;

    public $items = array();

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

    public function setPayment(PaymentDelete $payment)
    {
        $this->payment = $payment;
    }

    public function addItem(DeleteItem $item)
    {
        $this->items[] = $item;
    }
}