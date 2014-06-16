<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/13/14
 * Time: 1:18
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Seat;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class ReservationRequest  extends AbstractTransferBehavior
{
    protected $sessionId;
    protected $buyer;
    protected $orderItems;

    public function __construct()
    {
        $this->orderItems = new \SplObjectStorage;
    }

    /**
     * @param mixed $buyer
     */
    public function setBuyer(BuyerRequest $buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param mixed $orderItems
     */
    public function setOrderItems(OrderItemRequest $orderItem)
    {
        $this->orderItems->attach($orderItem);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }
} 