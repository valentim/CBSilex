<?php
namespace Clickbus\RestHandler\DTO\Booking;

class DeleteItem
{
    public $order_item;

    public $subtotal;

    public $status;

    public $messages = array();

    public function setOrderItem($orderItem)
    {
        $this->order_item = $orderItem;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }
}