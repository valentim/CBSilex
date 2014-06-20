<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class DeleteItem extends AbstractTransferBehavior
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

    public function setMessage($message)
    {
        $this->messages[] = $message;
    }
}