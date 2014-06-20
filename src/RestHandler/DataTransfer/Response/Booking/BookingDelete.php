<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BookingDelete extends AbstractTransferBehavior
{
    public $id;

    public $status;

    public $localizer;

    public $payment;

    public $items;

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

    public function setPayment(PaymentDelete $paymentDelete)
    {
        $this->payment = $paymentDelete;
    }

    public function addItem(DeleteItem $deleteItem)
    {
        $this->items->attach($deleteItem);
    }
}