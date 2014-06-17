<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Booking extends AbstractTransferBehavior
{
    public $seatReservation;
    public $status;
    public $messages;
    public $products;

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $seatReservation
     */
    public function setSeatReservation($seatReservation)
    {
        $this->seatReservation = $seatReservation;
    }

    /**
     * @return mixed
     */
    public function getSeatReservation()
    {
        return $this->seatReservation;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


}
